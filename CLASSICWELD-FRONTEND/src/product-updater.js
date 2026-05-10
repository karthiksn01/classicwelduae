const BACKEND_URL = import.meta.env.VITE_API_URL || (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1' 
    ? `http://${window.location.hostname}:8000` 
    : '');
const API_BASE = `${BACKEND_URL}/api/admin`;
const PUBLIC_API = `${BACKEND_URL}/api`;

window.resolveImagePath = (path) => {
    if (!path || path === 'default.png') return '/logo.png';
    let finalPath = path;
    
    if (path.startsWith('http')) {
        finalPath = path;
    } else if (path.startsWith('/storage/')) {
        finalPath = `${BACKEND_URL}${path}`;
    } else if (path.startsWith('products/')) {
        finalPath = `${BACKEND_URL}/storage/${path}`;
    } else if (!path.includes('/')) {
        // If it's a single filename, check if it looks like a Laravel storage hash (e.g., QHCGGC...)
        // or if it's a legacy frontend asset.
        if (path.length > 30) {
            finalPath = `${BACKEND_URL}/storage/products/${path}`;
        } else {
            finalPath = `/assets/products/${path}`;
        }
    }

    // Add cache buster for storage images
    if (finalPath.includes('/storage/')) {
        return `${finalPath}?t=${new Date().getTime()}`;
    }
    return finalPath;
};

let productsCache = [];
let categoriesCache = [];
let trashCache = [];
let messagesCacheData = [];

// Tab Switching Logic
document.querySelectorAll('.updater-tab-btn').forEach(btn => {
    btn.addEventListener('click', (e) => {
        // Update active button state
        document.querySelectorAll('.updater-tab-btn').forEach(b => {
            b.classList.remove('bg-weld-orange', 'text-white', 'active');
            b.classList.add('bg-zinc-800', 'text-gray-400');
        });
        e.currentTarget.classList.remove('bg-zinc-800', 'text-gray-400');
        e.currentTarget.classList.add('bg-weld-orange', 'text-white', 'active');

        // Show corresponding tab
        const targetId = e.currentTarget.getAttribute('data-target');
        document.querySelectorAll('.updater-tab').forEach(tab => {
            tab.classList.add('hidden');
            tab.classList.remove('block');
        });
        document.getElementById(targetId).classList.remove('hidden');
        document.getElementById(targetId).classList.add('block');

        // Refresh data based on tab
        if (targetId === 'tab-recycle') fetchTrash();
        else if (targetId === 'tab-messages') fetchMessages();
        else fetchProducts();
    });
});

// Initialize
fetchCategories();
fetchProducts();
fetchMessages();

// --- API FETCHERS ---

async function fetchMessages() {
    try {
        const res = await fetch(`${API_BASE}/messages`, { 
            credentials: 'include',
            headers: { 'Accept': 'application/json' }
        });
        if (!res.ok) throw new Error("Unauthorized");
        messagesCacheData = await res.json();
        renderMessagesTable(messagesCacheData);
    } catch (e) {
        console.error("Error fetching messages", e);
        const tbody = document.getElementById('messages-table-body');
        if (tbody) tbody.innerHTML = '<tr><td colspan="6" class="p-8 text-center text-red-500">Failed to load messages. Please login again.</td></tr>';
    }
}

function renderMessagesTable(messages) {
    const tbody = document.getElementById('messages-table-body');
    if (!tbody) return;

    if (!messages.length) {
        tbody.innerHTML = '<tr><td colspan="6" class="p-8 text-center text-gray-500">No messages yet.</td></tr>';
        return;
    }

    tbody.innerHTML = messages.map(msg => `
        <tr class="${msg.is_read ? 'opacity-60' : 'bg-blue-500/5'} transition-all hover:bg-zinc-800/50">
            <td class="px-4 py-4 text-gray-500 text-xs">${new Date(msg.created_at).toLocaleDateString()}</td>
            <td class="px-4 py-4">
                <div class="font-bold">${msg.name}</div>
                <div class="text-[10px] text-gray-500">${msg.email}</div>
            </td>
            <td class="px-4 py-4">
                <span class="px-2 py-0.5 rounded text-[10px] font-bold ${msg.type === 'feedback' ? 'bg-amber-500/10 text-amber-500 border border-amber-500/20' : 'bg-blue-500/10 text-blue-500 border border-blue-500/20'}">
                    ${msg.type.toUpperCase()}
                </span>
            </td>
            <td class="px-4 py-4 font-medium">
                ${msg.type === 'feedback' ? `Rating: ${'★'.repeat(msg.rating)}${'☆'.repeat(5-msg.rating)}` : (msg.subject || 'N/A')}
            </td>
            <td class="px-4 py-4 max-w-[200px] truncate text-gray-400" title="${msg.message}">${msg.message}</td>
            <td class="px-4 py-4 text-right">
                <div class="flex justify-end gap-2">
                    <button onclick="window.openMessageDetail(${msg.id})" class="p-1.5 hover:text-white bg-zinc-800 rounded transition-colors" title="View Detail">
                        <i class="ph-bold ph-eye"></i>
                    </button>
                    ${!msg.is_read ? `
                        <button onclick="window.markMessageRead(${msg.id})" class="p-1.5 hover:text-blue-500 transition-colors" title="Mark as Read">
                            <i class="ph-bold ph-check"></i>
                        </button>
                    ` : ''}
                    <button onclick="window.deleteMessage(${msg.id})" class="p-1.5 hover:text-red-500 transition-colors" title="Delete">
                        <i class="ph-bold ph-trash"></i>
                    </button>
                </div>
            </td>
        </tr>
    `).join('');
}

window.openMessageDetail = (id) => {
    const msg = messagesCacheData.find(m => m.id === id);
    if (!msg) return;

    document.getElementById('msg-detail-name').innerText = msg.name;
    document.getElementById('msg-detail-email').innerText = msg.email;
    document.getElementById('msg-detail-date').innerText = new Date(msg.created_at).toLocaleString();
    document.getElementById('msg-detail-body').innerText = msg.message;
    document.getElementById('msg-detail-subject').innerText = msg.type === 'feedback' ? `Rating: ${msg.rating}/5` : (msg.subject || 'No Subject');
    
    const typeBadge = document.getElementById('msg-detail-type');
    typeBadge.innerText = msg.type.toUpperCase();
    typeBadge.className = `px-2 py-0.5 rounded text-[10px] font-bold inline-block mt-1 ${msg.type === 'feedback' ? 'bg-amber-500/10 text-amber-500' : 'bg-blue-500/10 text-blue-500'}`;

    const delBtn = document.getElementById('msg-detail-delete-btn');
    delBtn.onclick = () => {
        window.closeMessageDetailModal();
        window.deleteMessage(msg.id);
    };

    document.getElementById('message-detail-modal').classList.remove('hidden');
    
    // Auto-mark as read if unread
    if (!msg.is_read) {
        window.markMessageRead(id);
    }
};

window.closeMessageDetailModal = () => {
    document.getElementById('message-detail-modal').classList.add('hidden');
};

window.markMessageRead = async (id) => {
    try {
        await fetch(`${API_BASE}/messages/${id}/read`, { method: "POST", credentials: 'include' });
        fetchMessages();
    } catch (e) { console.error(e); }
};

window.deleteMessage = async (id) => {
    if (!confirm("Delete this message permanently?")) return;
    try {
        await fetch(`${API_BASE}/messages/${id}`, { method: "DELETE", credentials: 'include' });
        fetchMessages();
    } catch (e) { console.error(e); }
};

window.fetchMessages = fetchMessages;

// --- API FETCHERS ---

async function fetchCategories() {
    try {
        const res = await fetch(`${PUBLIC_API}/categories`, { 
            credentials: 'include',
            headers: { 'Accept': 'application/json' }
        });
        categoriesCache = await res.json();
        renderCategoryOptions();
        renderCategoryList();
    } catch (e) { console.error("Error fetching categories", e); }
}

async function fetchProducts() {
    try {
        const res = await fetch(`${API_BASE}/products?t=${new Date().getTime()}`, { 
            credentials: 'include',
            headers: { 'Accept': 'application/json' }
        });
        productsCache = await res.json();
        renderManagementTable();
        renderHotSaleGrid();
        renderSoldOutGrid();
    } catch (e) { console.error("Error fetching products", e); }
}

async function fetchTrash() {
    try {
        const res = await fetch(`${API_BASE}/products/trash`, { 
            credentials: 'include',
            headers: { 'Accept': 'application/json' }
        });
        trashCache = await res.json();
        renderTrashTable();
    } catch (e) { console.error("Error fetching trash", e); }
}

// --- RENDERERS ---

function renderManagementTable(data = productsCache) {
    const tbody = document.getElementById('management-table-body');
    if (!data.length) {
        tbody.innerHTML = '<tr><td colspan="6" class="p-8 text-center text-gray-500">No active products found.</td></tr>';
        return;
    }

    tbody.innerHTML = data.map(p => {
        const imgSrc = window.resolveImagePath(p.image);
        return `
        <tr class="hover:bg-zinc-800/30 transition-colors">
            <td class="px-4 py-3"><img src="${imgSrc}" onerror="this.src='/logo.png'" onclick="window.openImagePreviewModal(this.src)" class="w-10 h-10 object-cover rounded bg-zinc-800 cursor-pointer hover:opacity-80 transition-opacity border border-zinc-700"></td>
            <td class="px-4 py-3 font-bold">${p.name}</td>
            <td class="px-4 py-3 text-gray-400">${p.product_category?.name || p.category || 'Uncategorized'}</td>
            <td class="px-4 py-3">${p.stock}</td>
            <td class="px-4 py-3 text-right">
                <button onclick="window.editProduct(${p.id})" class="text-weld-orange hover:text-amber-500 p-2"><i class="ph-bold ph-pencil-simple"></i></button>
                <button onclick="window.deleteProduct(${p.id})" class="text-gray-500 hover:text-red-500 p-2"><i class="ph-bold ph-trash"></i></button>
            </td>
        </tr>
    `;}).join('');
}

function renderHotSaleGrid(data = productsCache) {
    const grid = document.getElementById('hotsale-grid');
    if (!data.length) {
        grid.innerHTML = '<div class="col-span-full p-8 text-center text-gray-500">No products found.</div>';
        return;
    }
    grid.innerHTML = data.map(p => {
        const imgSrc = window.resolveImagePath(p.image);
        return `
        <div class="glass p-4 rounded-xl flex items-center justify-between border ${p.is_hot_sale ? 'border-amber-500/50 bg-amber-500/5' : 'border-zinc-800'}">
            <div class="flex items-center gap-3">
                <img src="${imgSrc}" onerror="this.src='/logo.png'" onclick="window.openImagePreviewModal(this.src)" class="w-12 h-12 object-cover rounded bg-zinc-800 cursor-pointer hover:opacity-80 transition-opacity border border-zinc-700">
                <div>
                    <h4 class="font-bold text-sm line-clamp-1">${p.name}</h4>
                    <p class="text-xs text-gray-500">${p.is_hot_sale ? '<span class="text-amber-500">Featured</span>' : 'Not Featured'}</p>
                </div>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" class="sr-only peer" ${p.is_hot_sale ? 'checked' : ''} onchange="window.toggleHotSale(${p.id}, this.checked)">
              <div class="w-11 h-6 bg-zinc-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-amber-500"></div>
            </label>
        </div>
    `;}).join('');
}

function renderSoldOutGrid(data = productsCache) {
    const grid = document.getElementById('soldout-grid');
    if (!data.length) {
        grid.innerHTML = '<div class="col-span-full p-8 text-center text-gray-500">No products found.</div>';
        return;
    }
    grid.innerHTML = data.map(p => {
        const imgSrc = window.resolveImagePath(p.image);
        return `
        <div class="glass p-4 rounded-xl flex items-center justify-between border ${p.is_sold_out ? 'border-red-500/50 bg-red-500/5' : 'border-zinc-800'}">
            <div class="flex items-center gap-3">
                <img src="${imgSrc}" onerror="this.src='/logo.png'" onclick="window.openImagePreviewModal(this.src)" class="w-12 h-12 object-cover rounded bg-zinc-800 cursor-pointer hover:opacity-80 transition-opacity border border-zinc-700">
                <div>
                    <h4 class="font-bold text-sm line-clamp-1">${p.name}</h4>
                    <p class="text-xs text-gray-500">${p.is_sold_out ? '<span class="text-red-500">Sold Out</span>' : 'Available'}</p>
                </div>
            </div>
            <label class="relative inline-flex items-center cursor-pointer">
              <input type="checkbox" class="sr-only peer" ${p.is_sold_out ? 'checked' : ''} onchange="window.toggleSoldOut(${p.id}, this.checked)">
              <div class="w-11 h-6 bg-zinc-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-red-500"></div>
            </label>
        </div>
    `;}).join('');
}

function renderTrashTable(data = trashCache) {
    const tbody = document.getElementById('recycle-table-body');
    if (!data.length) {
        tbody.innerHTML = '<tr><td colspan="3" class="p-8 text-center text-gray-500">Recycle bin is empty or no match found.</td></tr>';
        return;
    }
    tbody.innerHTML = data.map(p => `
        <tr class="hover:bg-zinc-800/30 transition-colors">
            <td class="px-4 py-3 font-bold">${p.name}</td>
            <td class="px-4 py-3 text-gray-400 text-xs">${new Date(p.deleted_at).toLocaleString()}</td>
            <td class="px-4 py-3 text-right">
                <button onclick="window.restoreProduct(${p.id})" class="bg-zinc-800 hover:bg-zinc-700 text-white px-3 py-1 rounded text-xs mr-2 border border-zinc-700"><i class="ph-bold ph-arrow-u-up-left mr-1"></i> Restore</button>
                <button onclick="window.forceDeleteProduct(${p.id})" class="bg-red-900/50 hover:bg-red-600 text-red-200 hover:text-white px-3 py-1 rounded text-xs"><i class="ph-bold ph-trash mr-1"></i> Delete</button>
            </td>
        </tr>
    `).join('');
}

function renderCategoryOptions() {
    const select = document.getElementById('product-category');
    select.innerHTML = '<option value="">Select Category...</option>' + 
        categoriesCache.map(c => `<option value="${c.id}">${c.name}</option>`).join('');
}

function renderCategoryList() {
    const tbody = document.getElementById('category-list');
    tbody.innerHTML = categoriesCache.map(c => `
        <tr>
            <td class="p-3">${c.name}</td>
            <td class="p-3 text-right">
                <button onclick="window.deleteCategory(${c.id})" class="text-gray-500 hover:text-red-500"><i class="ph-bold ph-trash"></i></button>
            </td>
        </tr>
    `).join('');
}


// --- FILTERING LOGIC ---

window.filterManagement = () => {
    const query = document.getElementById('search-management').value.toLowerCase();
    const filtered = productsCache.filter(p => p.name.toLowerCase().includes(query) || (p.product_category?.name || '').toLowerCase().includes(query));
    renderManagementTable(filtered);
};

window.filterHotSale = () => {
    const query = document.getElementById('search-hotsale').value.toLowerCase();
    const filtered = productsCache.filter(p => p.name.toLowerCase().includes(query));
    renderHotSaleGrid(filtered);
};

window.filterSoldOut = () => {
    const query = document.getElementById('search-soldout').value.toLowerCase();
    const filtered = productsCache.filter(p => p.name.toLowerCase().includes(query));
    renderSoldOutGrid(filtered);
};

window.filterRecycle = () => {
    const query = document.getElementById('search-recycle').value.toLowerCase();
    const filtered = trashCache.filter(p => p.name.toLowerCase().includes(query));
    renderTrashTable(filtered);
};

// --- CUSTOM CONFIRM MODAL ---
window.showConfirm = (title, message) => {
    return new Promise((resolve) => {
        const modal = document.getElementById('confirm-modal');
        if (!modal) return resolve(confirm(message)); // Fallback if modal HTML is missing

        document.getElementById('confirm-title').innerText = title;
        document.getElementById('confirm-message').innerText = message;
        
        const cleanup = () => {
            modal.classList.add('hidden');
            document.getElementById('confirm-cancel-btn').removeEventListener('click', onCancel);
            document.getElementById('confirm-proceed-btn').removeEventListener('click', onProceed);
            document.getElementById('confirm-backdrop').removeEventListener('click', onCancel);
        };
        
        const onCancel = () => { cleanup(); resolve(false); };
        const onProceed = () => { cleanup(); resolve(true); };
        
        document.getElementById('confirm-cancel-btn').addEventListener('click', onCancel);
        document.getElementById('confirm-proceed-btn').addEventListener('click', onProceed);
        document.getElementById('confirm-backdrop').addEventListener('click', onCancel);
        
        modal.classList.remove('hidden');
    });
};

// --- ACTIONS ---

window.toggleHotSale = async (id, isChecked) => {
    try {
        await fetch(`${API_BASE}/products/${id}/toggle-hot-sale`, { method: 'POST', credentials: 'include' });
        fetchProducts(); // refresh all grids to update styling
    } catch(e) { console.error(e); }
};

window.toggleSoldOut = async (id, isChecked) => {
    try {
        await fetch(`${API_BASE}/products/${id}/toggle-sold-out`, { method: 'POST', credentials: 'include' });
        fetchProducts();
    } catch(e) { console.error(e); }
};

window.deleteProduct = async (id) => {
    const confirmed = await window.showConfirm("Delete Product", "Move this product to the Recycle Bin?");
    if(confirmed) {
        try {
            await fetch(`${API_BASE}/products/${id}`, { method: 'DELETE', credentials: 'include' });
            fetchProducts();
        } catch(e) { console.error(e); }
    }
};

window.restoreProduct = async (id) => {
    try {
        await fetch(`${API_BASE}/products/${id}/restore`, { method: 'POST', credentials: 'include' });
        fetchTrash();
        fetchProducts(); // background update
    } catch(e) { console.error(e); }
};

window.forceDeleteProduct = async (id) => {
    const confirmed = await window.showConfirm("Permanent Delete", "Permanently delete this product? This CANNOT be undone.");
    if(confirmed) {
        try {
            await fetch(`${API_BASE}/products/${id}/force`, { method: 'DELETE', credentials: 'include' });
            fetchTrash();
        } catch(e) { console.error(e); }
    }
};


// --- CATEGORY MODAL ---

window.openCategoryModal = () => document.getElementById('category-modal').classList.remove('hidden');
window.closeCategoryModal = () => document.getElementById('category-modal').classList.add('hidden');

window.createCategory = async () => {
    const input = document.getElementById('new-category-name');
    const name = input.value.trim();
    if(!name) return;

    try {
        const res = await fetch(`${API_BASE}/categories`, {
            method: 'POST',
            credentials: 'include',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ name: name, slug: name.toLowerCase().replace(/[^a-z0-9]+/g, '-') })
        });
        if(res.ok) {
            input.value = '';
            fetchCategories();
        }
    } catch(e) { console.error(e); }
};


// --- PRODUCT MODAL & FORM ---

window.openProductModal = () => {
    document.getElementById('product-form').reset();
    document.getElementById('product-id').value = '';
    document.getElementById('product-modal-title').innerText = 'Add New Product';
    document.getElementById('product-image-preview').classList.add('hidden');
    const viewBtn = document.getElementById('view-full-preview-btn');
    if(viewBtn) viewBtn.classList.add('hidden');
    document.getElementById('features-container').innerHTML = '';
    document.getElementById('specs-container').innerHTML = '';
    document.getElementById('product-modal').classList.remove('hidden');
};

window.closeProductModal = () => document.getElementById('product-modal').classList.add('hidden');

window.editProduct = (id) => {
    const product = productsCache.find(p => p.id === id);
    if(!product) return;

    document.getElementById('product-id').value = product.id;
    document.getElementById('product-modal-title').innerText = 'Edit Product';
    document.getElementById('product-name').value = product.name || '';
    document.getElementById('product-category').value = product.category_id || '';
    document.getElementById('product-stock').value = product.stock || '';
    document.getElementById('product-moq').value = product.moq || '';
    document.getElementById('product-warranty').value = product.warranty_years || '';
    document.getElementById('product-desc').value = product.description || '';

    const currentNameEl = document.getElementById('current-image-name');
    if (product.image) {
        const preview = document.getElementById('product-image-preview');
        const viewBtn = document.getElementById('view-full-preview-btn');
        preview.src = window.resolveImagePath(product.image);
        preview.classList.remove('hidden');
        if(viewBtn) viewBtn.classList.remove('hidden');
        
        if (currentNameEl) {
            const fileName = product.image.split('/').pop();
            currentNameEl.innerText = "Current: " + fileName;
        }
    } else {
        if (currentNameEl) currentNameEl.innerText = "";
    }

    // Load JSONs
    const fContainer = document.getElementById('features-container');
    fContainer.innerHTML = '';
    if(product.features && product.features.length) {
        product.features.forEach(f => window.addFeatureRow(f));
    }

    const sContainer = document.getElementById('specs-container');
    sContainer.innerHTML = '';
    if(product.specifications && Object.keys(product.specifications).length) {
        Object.entries(product.specifications).forEach(([k, v]) => window.addSpecRow(k, v));
    }

    document.getElementById('product-modal').classList.remove('hidden');
};

window.addFeatureRow = (val = '') => {
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" value="${val}" class="feature-input flex-1 bg-black border border-zinc-700 rounded p-2 text-sm text-white" placeholder="Feature description">
        <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-400"><i class="ph-bold ph-minus-circle"></i></button>
    `;
    document.getElementById('features-container').appendChild(div);
};

window.addSpecRow = (key = '', val = '') => {
    const div = document.createElement('div');
    div.className = 'flex gap-2';
    div.innerHTML = `
        <input type="text" value="${key}" class="spec-key w-1/3 bg-black border border-zinc-700 rounded p-2 text-sm text-white" placeholder="Label">
        <input type="text" value="${val}" class="spec-val flex-1 bg-black border border-zinc-700 rounded p-2 text-sm text-white" placeholder="Value">
        <button type="button" onclick="this.parentElement.remove()" class="text-red-500 hover:text-red-400"><i class="ph-bold ph-minus-circle"></i></button>
    `;
    document.getElementById('specs-container').appendChild(div);
};

document.getElementById('product-form').addEventListener('submit', async (e) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    const id = document.getElementById('product-id').value;
    const url = id ? `${API_BASE}/products/${id}` : `${API_BASE}/products`;
    
    // Package Features
    const features = Array.from(document.querySelectorAll('.feature-input'))
        .map(i => i.value.trim())
        .filter(v => v);
    formData.append('features', JSON.stringify(features));

    // Package Specs
    const specs = {};
    document.querySelectorAll('#specs-container > div').forEach(div => {
        const k = div.querySelector('.spec-key').value.trim();
        const v = div.querySelector('.spec-val').value.trim();
        if(k && v) specs[k] = v;
    });
    formData.append('specifications', JSON.stringify(specs));

    const btn = document.getElementById('product-save-btn');
    btn.disabled = true;
    btn.innerText = "Saving...";

    // Check file size before sending (standard PHP limit is often 2MB)
    const fileInput = document.getElementById('product-image');
    if (fileInput.files[0] && fileInput.files[0].size > 2 * 1024 * 1024) {
        alert("Image is too large! Please use an image smaller than 2MB.");
        btn.disabled = false;
        btn.innerText = "Save Product";
        return;
    }

    try {
        console.log("Sending to:", url);
        const res = await fetch(url, {
            method: 'POST', 
            credentials: 'include',
            headers: {
                'Accept': 'application/json'
            },
            body: formData
        });

        if(res.ok) {
            window.closeProductModal();
            fetchProducts();
        } else {
            const err = await res.json();
            alert("Error saving: " + (err.message || 'Validation failed'));
        }
    } catch(err) {
        console.error("Fetch error:", err);
        alert("Network Error: " + err.message + "\nCheck if the image is too large or if the backend server is down.");
    } finally {
        btn.disabled = false;
        btn.innerText = "Save Product";
    }
});

// --- IMAGE PREVIEW LOGIC ---

window.previewImage = (event) => {
    const input = event.target;
    const preview = document.getElementById('product-image-preview');
    const viewBtn = document.getElementById('view-full-preview-btn');
    
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.src = e.target.result;
            preview.classList.remove('hidden');
            if(viewBtn) viewBtn.classList.remove('hidden');
        };
        reader.readAsDataURL(input.files[0]);
    } else {
        preview.src = '';
        preview.classList.add('hidden');
        if(viewBtn) viewBtn.classList.add('hidden');
    }
};

window.openImagePreviewModal = (src) => {
    if (!src || src === '/logo.png') return;
    document.getElementById('full-image-preview').src = src;
    document.getElementById('image-preview-modal').classList.remove('hidden');
};

window.closeImagePreviewModal = () => {
    document.getElementById('image-preview-modal').classList.add('hidden');
    setTimeout(() => {
        document.getElementById('full-image-preview').src = '';
    }, 300); // clear after fade out
};

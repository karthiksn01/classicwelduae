// Cart State Management
class ShoppingCart {
    constructor() {
        this.items = JSON.parse(localStorage.getItem('cart_items')) || [];
        this.init();
    }

    init() {
        // Update badge on load
        document.addEventListener('DOMContentLoaded', () => {
            this.updateBadge();
        });
    }

    save() {
        localStorage.setItem('cart_items', JSON.stringify(this.items));
        this.updateBadge();
    }

    add(id, name, price, image, quantity = 1) {
        const existingItem = this.items.find(item => item.id === id);
        
        if (existingItem) {
            existingItem.quantity += parseInt(quantity);
        } else {
            this.items.push({
                id,
                name,
                price: parseFloat(price),
                image,
                quantity: parseInt(quantity)
            });
        }
        
        this.save();
        
        if (window.showToast) {
            window.showToast(`Added ${name} to cart`, 'success');
        } else {
            this.showToast(`Added ${name} to cart`);
        }
        
        this.updateButtons(id);
    }

    updateButtons(id) {
        document.querySelectorAll(`.add-to-cart-btn[data-product-id="${id}"]`).forEach(btn => {
            const originalHTML = btn.innerHTML;
            const originalClass = btn.className;
            
            btn.innerHTML = `<i class="ph-bold ph-check"></i> Added`;
            btn.classList.remove('bg-weld-orange', 'hover:bg-amber-600');
            btn.classList.add('bg-green-600', 'hover:bg-green-700');
            
            setTimeout(() => {
                btn.innerHTML = originalHTML;
                btn.className = originalClass;
            }, 2000);
        });
    }

    remove(id) {
        this.items = this.items.filter(item => item.id !== id);
        this.save();
        if (window.renderCart) window.renderCart(); // Call render if on cart page
    }

    updateQuantity(id, change) {
        const item = this.items.find(item => item.id === id);
        if (item) {
            item.quantity += change;
            if (item.quantity <= 0) {
                this.remove(id);
            } else {
                this.save();
                if (window.renderCart) window.renderCart();
            }
        }
    }

    clear() {
        this.items = [];
        this.save();
        if (window.renderCart) window.renderCart();
    }

    getTotal() {
        return this.items.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    }

    updateBadge() {
        const badge = document.getElementById('cart-count');
        if (badge) {
            const count = this.items.reduce((sum, item) => sum + item.quantity, 0);
            badge.innerText = count;
            // Add a small bounce animation
            badge.classList.remove('animate-bounce');
            void badge.offsetWidth; // trigger reflow
            badge.classList.add('animate-bounce');
            setTimeout(() => badge.classList.remove('animate-bounce'), 1000);
        }
    }

    showToast(message) {
        let toastContainer = document.getElementById('toast-container');
        if (!toastContainer) {
            toastContainer = document.createElement('div');
            toastContainer.id = 'toast-container';
            toastContainer.className = 'fixed bottom-4 right-4 z-50 flex flex-col gap-2';
            document.body.appendChild(toastContainer);
        }

        const toast = document.createElement('div');
        toast.className = 'bg-zinc-800 border border-weld-orange/30 text-white px-6 py-3 rounded-xl shadow-lg flex items-center gap-3 animate-fade-in translate-y-0 opacity-100 transition-all duration-300';
        toast.innerHTML = `<i class="ph-fill ph-check-circle text-weld-orange text-xl"></i> <span>${message}</span>`;
        
        toastContainer.appendChild(toast);

        // Remove after 3 seconds
        setTimeout(() => {
            toast.style.opacity = '0';
            toast.style.transform = 'translateY(10px)';
            setTimeout(() => toast.remove(), 300);
        }, 3000);
    }
}

// Expose globally
window.Cart = new ShoppingCart();
window.addToCart = (id, name, price, image, quantity = 1) => window.Cart.add(id, name, price, image, quantity);

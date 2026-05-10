<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class NewProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Truncate existing products to replace "everything" as requested
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Product::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        $products = [
            // WELDING & CUTTING SETS
            ['name' => 'CW-WC-21P WELDING & CUTTING SET', 'retail_price' => 800.00, 'dealer_price' => 850.00, 'category' => 'Sets'],
            ['name' => 'CW-WC-20P-MD WELDING & CUTTING SET MEDIUM', 'retail_price' => 600.00, 'dealer_price' => 625.00, 'category' => 'Sets'],
            ['name' => 'CW-WC-2CY PORTABLE WELDING & CUTTING SET WITH CYLINDER', 'retail_price' => 875.00, 'dealer_price' => 950.00, 'category' => 'Sets'],
            
            // ATTACHMENTS & HANDLES
            ['name' => 'CW-CA-212 CUTTING ATTACHMENT H/D', 'retail_price' => 105.00, 'dealer_price' => 125.00, 'category' => 'Torches & Attachments'],
            ['name' => 'CW-CA-222 CUTTING ATTACHMENT MEDIUM DUTY', 'retail_price' => 95.00, 'dealer_price' => 105.00, 'category' => 'Torches & Attachments'],
            ['name' => 'CW-TH-211 TORCH HANDLE HD', 'retail_price' => 95.00, 'dealer_price' => 115.00, 'category' => 'Torches & Attachments'],
            ['name' => 'CW-TH-221 TORCH HANDLE MEDIUM DUTY', 'retail_price' => 90.00, 'dealer_price' => 105.00, 'category' => 'Torches & Attachments'],
            
            // WELDING NOZZLES
            ['name' => 'WELDING NOZZLE HD CW-WN-00', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'WELDING NOZZLE HD CW-WN-0', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'WELDING NOZZLE HD CW-WN-1', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'WELDING NOZZLE HD CW-WN-2', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'WELDING NOZZLE HD CW-WN-3', 'retail_price' => 22.00, 'dealer_price' => 26.00, 'category' => 'Nozzles'],
            ['name' => 'WELDING NOZZLE HD CW-WN-5', 'retail_price' => 28.00, 'dealer_price' => 32.00, 'category' => 'Nozzles'],
            ['name' => 'WELDING NOZZLE MD CW-WN-0-MD', 'retail_price' => 18.00, 'dealer_price' => 20.00, 'category' => 'Nozzles'],
            ['name' => 'WELDING NOZZLE MD CW-WN-1-MD', 'retail_price' => 18.00, 'dealer_price' => 20.00, 'category' => 'Nozzles'],
            ['name' => 'WELDING NOZZLE MD CW-WN-2-MD', 'retail_price' => 18.00, 'dealer_price' => 20.00, 'category' => 'Nozzles'],

            // CUTTING NOZZLES
            ['name' => 'CUTTING NOZZLE ACETELYNE HD CW-CN-00-1-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE ACETELYNE HD CW-CN-0-1-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE ACETELYNE HD CW-CN-1-1-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE ACETELYNE HD CW-CN-2-1-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE ACETELYNE HD CW-CN-3-1-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE ACETELYNE HD CW-CN-4-1-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE ACETELYNE HD CW-CN-5-1-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE ACETELYNE MD CW-CN-0-3-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE ACETELYNE MD CW-CN-1-3-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD-GPN CW-CN-GPN-00', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD-GPN CW-CN-GPN-0', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD-GPN CW-CN-GPN-1', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD-GPN CW-CN-GPN-2', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD-GPN CW-CN-GPN-3', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD-GPN CW-CN-GPN-4', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD-GPN CW-CN-GPN-5', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE MD-GPN CW-CN-0-3-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE MD-GPN CW-CN-1-3-101', 'retail_price' => 13.00, 'dealer_price' => 14.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD ANME-0 CW-CN-ANME-0', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD ANME-1 CW-CN-ANME-1', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD ANME-2 CW-CN-ANME-2', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD ANME-3 CW-CN-ANME-3', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD ANME-4 CW-CN-ANME-4', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD ANME-5 CW-CN-ANME-5', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD PNME-0 CW-CN-PNME-0', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD PNME-1 CW-CN-PNME-1', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD PNME-2 CW-CN-PNME-2', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD PNME-3 CW-CN-PNME-3', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD PNME-4 CW-CN-PNME-4', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],
            ['name' => 'CUTTING NOZZLE HD PNME-5 CW-CN-PNME-5', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Nozzles'],

            // FLASH BACK ARRESTORS
            ['name' => 'FLASH BACK ARRESTOR TORCH HANDLE OXYGEN CW-FA-188-R', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Safety & Accessories'],
            ['name' => 'FLASH BACK ARRESTOR TORCH HANDLE ACETELYN CW-FA-188-L', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Safety & Accessories'],
            ['name' => 'FLASH BACK ARRESTOR REGULATOR OXYGEN CW-FA-288-R', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Safety & Accessories'],
            ['name' => 'FLASH BACK ARRESTOR REGULATOR ACETELYN CW-FA-288-L', 'retail_price' => 20.00, 'dealer_price' => 24.00, 'category' => 'Safety & Accessories'],
            ['name' => 'FLASH BACK ARRESTOR HOSE TO HOSE OXYGEN CW-FA-388-R', 'retail_price' => 22.00, 'dealer_price' => 26.00, 'category' => 'Safety & Accessories'],
            ['name' => 'FLASH BACK ARRESTOR HOSE TO HOSE ACETELYN CW-FA-388-L', 'retail_price' => 22.00, 'dealer_price' => 26.00, 'category' => 'Safety & Accessories'],
            ['name' => 'FLASH BACK ARRESTOR TORCH HANDLE FOR LPG CW-FA-H-188-L', 'retail_price' => 22.00, 'dealer_price' => 26.00, 'category' => 'Safety & Accessories'],
            ['name' => 'FLASH BACK ARRESTOR REGULATOR FOR LPG CW-FA-H-288-R', 'retail_price' => 22.00, 'dealer_price' => 26.00, 'category' => 'Safety & Accessories'],

            // HEATING NOZZLES
            ['name' => 'HEATING NOZZLE NO-8 CW-HN-8', 'retail_price' => 48.00, 'dealer_price' => 55.00, 'category' => 'Nozzles'],
            ['name' => 'HEATING NOZZLE NO-10 CW-HN-10', 'retail_price' => 75.00, 'dealer_price' => 85.00, 'category' => 'Nozzles'],

            // REGULATORS
            ['name' => 'OXYGEN REGULATOR HD CW-OX-HD-1', 'retail_price' => 155.00, 'dealer_price' => 175.00, 'category' => 'Regulators'],
            ['name' => 'ACETELYNE REGULATOR HD CW-AC-HD-1', 'retail_price' => 155.00, 'dealer_price' => 175.00, 'category' => 'Regulators'],
            ['name' => 'OXYGEN REGULATOR MD CW-OX-MD', 'retail_price' => 43.00, 'dealer_price' => 48.00, 'category' => 'Regulators'],
            ['name' => 'ACETELYNE REGULATOR MD CW-AC-MD', 'retail_price' => 43.00, 'dealer_price' => 48.00, 'category' => 'Regulators'],
            ['name' => 'ARGON REGULATOR FLOW METER WITH ONE DIAL CW-AR-25-FL', 'retail_price' => 145.00, 'dealer_price' => 160.00, 'category' => 'Regulators'],
            ['name' => 'ARGON REGULATOR WITH TWO DIAL -10 BAR CW-AR-10M-2D', 'retail_price' => 145.00, 'dealer_price' => 160.00, 'category' => 'Regulators'],
            ['name' => 'ARGON REGULATOR WITH TWO DIAL-50 BAR CW-AR-50M-2D', 'retail_price' => 195.00, 'dealer_price' => 225.00, 'category' => 'Regulators'],
            ['name' => 'ARGON REGULATOR WITH TWO FLOW METER CW-AR-25-2FL', 'retail_price' => 225.00, 'dealer_price' => 250.00, 'category' => 'Regulators'],
            ['name' => 'Co2 REGULATOR WITH FLOW METER & DIAL CW-CD-25-FL', 'retail_price' => 145.00, 'dealer_price' => 160.00, 'category' => 'Regulators'],
            ['name' => 'Co2 REGULATOR WITH TWO DIAL CW-CD-10M-2D', 'retail_price' => 145.00, 'dealer_price' => 160.00, 'category' => 'Regulators'],
            ['name' => 'Co2 REGULATOR WITH HEATER â€“HD-220V CW-Co2-HR-200-220', 'retail_price' => 235.00, 'dealer_price' => 255.00, 'category' => 'Regulators'],
            ['name' => 'Co2 REGULATOR WITH HEATER EXTRA HD 220V CW-Co2-HR-220-220', 'retail_price' => 275.00, 'dealer_price' => 295.00, 'category' => 'Regulators'],
            ['name' => 'Co2 REGULATOR WITH HEATER HD-110V CW-Co2-HR-220-110', 'retail_price' => 325.00, 'dealer_price' => 340.00, 'category' => 'Regulators'],
            ['name' => 'NITROGEN REGULATOR WITH FLOW METER & DIAL CW-N2-25-FL', 'retail_price' => 155.00, 'dealer_price' => 165.00, 'category' => 'Regulators'],
            ['name' => 'NITROGEN REGULATOR WITH TWO DIAL CW-N2-10M-2D', 'retail_price' => 155.00, 'dealer_price' => 165.00, 'category' => 'Regulators'],
            ['name' => 'NITROGEN REGULATOR WITH TWO DIAL HP-50 BAR CW-N2-50M-2D', 'retail_price' => 205.00, 'dealer_price' => 230.00, 'category' => 'Regulators'],
            ['name' => 'LPG REGULATOR WITHOUT DIAL â€“FEMALE NUT CW-LPG-313', 'retail_price' => 54.00, 'dealer_price' => 65.00, 'category' => 'Regulators'],
            ['name' => 'LPG REGULATOR WITH TWO DIAL HD FEMALE NUT CW-LPG-HD-M-2D', 'retail_price' => 155.00, 'dealer_price' => 170.00, 'category' => 'Regulators'],
            ['name' => 'LPG REGULATOR WITH TWO DIAL HD MALE NUT CW-LPG-HD-F-2D', 'retail_price' => 155.00, 'dealer_price' => 170.00, 'category' => 'Regulators'],
            ['name' => 'HYDROGEN REGULATOR WITH TWO DIAL 50 BAR CW-H2-50M-2D', 'retail_price' => 235.00, 'dealer_price' => 255.00, 'category' => 'Regulators'],
            ['name' => 'HELIUM REGULATOR WITH TWO DIAL 50-BAR CW-HE-50M-2D', 'retail_price' => 235.00, 'dealer_price' => 255.00, 'category' => 'Regulators'],
            ['name' => 'BALOON REGULATOR CW-HE-BR', 'retail_price' => 125.00, 'dealer_price' => 145.00, 'category' => 'Regulators'],

            // CUTTERS
            ['name' => 'GRAND CUTTER WITH 2 PIPE- 480 MM CW-GC-2P', 'retail_price' => 190.00, 'dealer_price' => 210.00, 'category' => 'Cutting'],
            ['name' => 'GRAND CUTTER WITH 3 PIPE-480 MM CW-GC-3P', 'retail_price' => 205.00, 'dealer_price' => 230.00, 'category' => 'Cutting'],

            // ACCESSORIES
            ['name' => 'SPIGOT FOR OXYGEN REGULATOR CW-SP-O2', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'NUT FOR OXYGEN REGULATOR CW-NT-O2', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'SPIGOT FOR ACETELYNE REGULATOR CW-SP-AC', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'NUT FOR ACETELYNE REGULATOR CW-NT-AC', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'SPIGOT FOR Co2 REGULATOR CW-SP-CD', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'NUT FOR Co2 REGULATOR CW-NT-CD', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'SPIGOT FOR LPG REGULATOR CW-SP-LP', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'NUT FOR LPG REGULATOR CW-NT-LP', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'HOSE NIPPLE FOR OXYGEN REGULATOR CW-HNP-O2', 'retail_price' => 2.50, 'dealer_price' => 3.00, 'category' => 'Accessories'],
            ['name' => 'NUT (HOSE) FOR OXYGEN REGULATOR CW-HN-O2', 'retail_price' => 2.50, 'dealer_price' => 3.00, 'category' => 'Accessories'],
            ['name' => 'HOSE NIPPLE FOR ACETELYNE REGULATOR CW-HNP-AC', 'retail_price' => 2.50, 'dealer_price' => 2.00, 'category' => 'Accessories'], // NOTE: 2.50/2.00 in text
            ['name' => 'NUT (HOSE) FOR ACETELYNE REGULATOR CW-HN-AC', 'retail_price' => 2.50, 'dealer_price' => 3.00, 'category' => 'Accessories'],
            ['name' => 'TIP NUT FOR VH-212 CW-TN-212', 'retail_price' => 10.00, 'dealer_price' => 12.00, 'category' => 'Accessories'],
            ['name' => 'NUT FOR CONNECT WITH HOSE NUT & REGU. OXY CW-XN-OX', 'retail_price' => 5.50, 'dealer_price' => 6.50, 'category' => 'Accessories'],
            ['name' => 'NUT FOR CONNECT WITH HOSE NUT & REGU. ACETE. CW-XN-AC', 'retail_price' => 5.50, 'dealer_price' => 6.50, 'category' => 'Accessories'],

            // HEATING TORCHES
            ['name' => 'HEATING TORCH BURNER TYPE-30 CM (WITH 50MM BURNER) HT-350', 'retail_price' => 50.00, 'dealer_price' => 55.00, 'category' => 'Torches & Attachments'],
            ['name' => 'HEATING TORCH BURNER TYPE-50 CM (WITH 75MM BURNER) HT-350', 'retail_price' => 55.00, 'dealer_price' => 60.00, 'category' => 'Torches & Attachments'],
            ['name' => 'HEATING TORCH BURNER TYPE-75 CM (WITH 75MM BURNER) HT-750', 'retail_price' => 60.00, 'dealer_price' => 65.00, 'category' => 'Torches & Attachments'],
            ['name' => 'HEATING TORCH BURNER TYPE-1 METER (WITH 75MM BURNER) HT-100', 'retail_price' => 70.00, 'dealer_price' => 75.00, 'category' => 'Torches & Attachments'],

            // CONNECTORS & SOCKETS (Single price)
            ['name' => 'MACHINE CONNECTOR 10-25 MALE RED', 'retail_price' => 6.00, 'dealer_price' => 6.00, 'category' => 'Connectors'],
            ['name' => 'MACHINE CONNECTOR 10-25 MALE BLACK', 'retail_price' => 6.00, 'dealer_price' => 6.00, 'category' => 'Connectors'],
            ['name' => 'MACHINE CONNECTOR 35-50 MALE RED', 'retail_price' => 8.00, 'dealer_price' => 8.00, 'category' => 'Connectors'],
            ['name' => 'MACHINE CONNECTOR 35-50 MALE BLACK', 'retail_price' => 8.00, 'dealer_price' => 8.00, 'category' => 'Connectors'],
            ['name' => 'MACHINE CONNECTOR 50-70 MALE RED', 'retail_price' => 9.50, 'dealer_price' => 9.50, 'category' => 'Connectors'],
            ['name' => 'MACHINE CONNECTOR 50-70 MALE BLACK', 'retail_price' => 9.50, 'dealer_price' => 9.50, 'category' => 'Connectors'],
            ['name' => 'MACHINE CONNECTOR 70-95 MALE RED( D/SCREW)', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Connectors'],
            ['name' => 'MACHINE CONNECTOR 70-95 MALE BLACK(D/SCREW)', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Connectors'],
            ['name' => 'PANEL SOCKET FEMALE RED 10-25', 'retail_price' => 6.00, 'dealer_price' => 6.00, 'category' => 'Connectors'],
            ['name' => 'PANEL SOCKET FEMALE BLACK 10-25', 'retail_price' => 6.00, 'dealer_price' => 6.00, 'category' => 'Connectors'],
            ['name' => 'PANEL SOCKET FEMALE RED 35-50', 'retail_price' => 8.50, 'dealer_price' => 8.50, 'category' => 'Connectors'],
            ['name' => 'PANEL SOCKET FEMALE RED 50-70', 'retail_price' => 10.00, 'dealer_price' => 10.00, 'category' => 'Connectors'],
            ['name' => 'PANEL SOCKET FEMALE BLACK 50-70', 'retail_price' => 10.00, 'dealer_price' => 10.00, 'category' => 'Connectors'],
            ['name' => 'PANEL SOCKET FEMALE RED 70-95', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Connectors'],
            ['name' => 'PANEL SOCKET FEMALE BLACK 70-95', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Connectors'],
            ['name' => 'CABLE CONNECTOR MALE BLACK 10-25', 'retail_price' => 6.00, 'dealer_price' => 6.00, 'category' => 'Connectors'],
            ['name' => 'CABLE CONNECTOR MALE BLACK 35-50', 'retail_price' => 8.50, 'dealer_price' => 8.50, 'category' => 'Connectors'],
            ['name' => 'CABLE CONNECTOR MALE BLACK 50-70', 'retail_price' => 10.00, 'dealer_price' => 10.00, 'category' => 'Connectors'],
            ['name' => 'CABLE CONNECTOR MALE BLACK 50-70 D/SCREW', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Connectors'],
            ['name' => 'CABLE CONNECTOR FEMALE BLACK 10-25', 'retail_price' => 6.00, 'dealer_price' => 6.00, 'category' => 'Connectors'],
            ['name' => 'CABLE CONNECTOR FEMALE BLACK 35-50', 'retail_price' => 8.50, 'dealer_price' => 8.50, 'category' => 'Connectors'],
            ['name' => 'CABLE CONNECTOR FEMALE BLACK 50-70', 'retail_price' => 10.00, 'dealer_price' => 10.00, 'category' => 'Connectors'],
            ['name' => 'CABLE CONNECTOR FEMALE BLACK 70-95 D/SCREW', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Connectors'],

            // HELMET & LIGHTERS
            ['name' => 'WELDING HELMAT', 'retail_price' => 18.00, 'dealer_price' => 18.00, 'category' => 'Safety & Accessories'],
            ['name' => 'SPARK LIGHTER SINGLE FLINT SF-01', 'retail_price' => 4.00, 'dealer_price' => 4.00, 'category' => 'Safety & Accessories'],
            ['name' => 'SPARK LIGHTER TRIPLE FLINT FL-03', 'retail_price' => 5.50, 'dealer_price' => 5.50, 'category' => 'Safety & Accessories'],
            ['name' => 'ONLY SINGLE FLINT (5 PC/PKT) SF-02', 'retail_price' => 3.25, 'dealer_price' => 3.25, 'category' => 'Safety & Accessories'],
            ['name' => 'ONLY SINGLE FLINT 1PC', 'retail_price' => 0.70, 'dealer_price' => 0.70, 'category' => 'Safety & Accessories'],
            ['name' => 'ONLY TRIPLE FLINT SL-02F', 'retail_price' => 1.45, 'dealer_price' => 1.45, 'category' => 'Safety & Accessories'],

            // GAS NOZZLES & TORCH SPARES
            ['name' => 'GAS NOZZLE 11.5 FOR 15 AK CW-15-AK', 'retail_price' => 6.50, 'dealer_price' => 6.50, 'category' => 'Torch Spares'],
            ['name' => 'GAS NOZZLE 15.0 FOR 25 AK CW-25-AK', 'retail_price' => 9.00, 'dealer_price' => 9.00, 'category' => 'Torch Spares'],
            ['name' => 'GAS NOZZLE MB36 CW-MB36', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Torch Spares'],
            ['name' => 'BACK UP SHORT CW-57Y04-SH', 'retail_price' => 2.00, 'dealer_price' => 2.00, 'category' => 'Torch Spares'],
            ['name' => 'BACK UP MEDIUM CW-41V35-MD', 'retail_price' => 2.75, 'dealer_price' => 2.75, 'category' => 'Torch Spares'],
            ['name' => 'BACK UP LONG CW-57Y02-LG', 'retail_price' => 3.25, 'dealer_price' => 3.25, 'category' => 'Torch Spares'],
            ['name' => 'TIP HOLDER 15 AK CW-15AK', 'retail_price' => 2.75, 'dealer_price' => 2.75, 'category' => 'Torch Spares'],
            ['name' => 'TIP HOLDER CW-MB-25AK', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],
            ['name' => 'TIP HOLDER BRASS CW-MB-15AK-BR', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],
            ['name' => 'CONTACT TIP M6 X 0.8 MM CW-M6-0.8', 'retail_price' => 1.40, 'dealer_price' => 1.40, 'category' => 'Torch Spares'],
            ['name' => 'CONTACT TIP M6 X 1.0 MM CW-M6-1.0', 'retail_price' => 1.40, 'dealer_price' => 1.40, 'category' => 'Torch Spares'],
            ['name' => 'CONTACT TIP M6 X 1.2 MM CW-M6-1.2', 'retail_price' => 1.40, 'dealer_price' => 1.40, 'category' => 'Torch Spares'],
            ['name' => 'CONTACT TIP M8 X 0.8 MM CW-M8-0.8', 'retail_price' => 2.25, 'dealer_price' => 2.25, 'category' => 'Torch Spares'],
            ['name' => 'CONTACT TIP M8 X 1.0 MM CW-M8-1.0', 'retail_price' => 2.25, 'dealer_price' => 2.25, 'category' => 'Torch Spares'],
            ['name' => 'CONTACT TIP M8 X 1.2 MM CW-M8-1.2', 'retail_price' => 2.25, 'dealer_price' => 2.25, 'category' => 'Torch Spares'],
            ['name' => 'COLLET 2.4 MM 10N24 CW-2.4-COL', 'retail_price' => 1.40, 'dealer_price' => 1.40, 'category' => 'Torch Spares'],
            ['name' => 'COLLET 3.2 MM 10N25 CW-3.2-COL', 'retail_price' => 1.40, 'dealer_price' => 1.40, 'category' => 'Torch Spares'],
            ['name' => 'COLLET BODY 2.4 MM 10N32 CW-2.4-CB', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],
            ['name' => 'COLET BODY 3.2 MM 10N28 CW-3.2-CB', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],

            // TIG RODS
            ['name' => 'ALUMINIUM TIG ROD 1.6 MM CLASSIC WELD', 'retail_price' => 26.00, 'dealer_price' => 26.00, 'description' => 'Price per KG', 'category' => 'Filler Materials'],
            ['name' => 'ALUMINIUM TIG ROD 2 MM CLASSIC WELD', 'retail_price' => 26.00, 'dealer_price' => 26.00, 'description' => 'Price per KG', 'category' => 'Filler Materials'],
            ['name' => 'ALUMINIUM TIG ROD 2.4 MM CLASSIC WELD', 'retail_price' => 26.00, 'dealer_price' => 26.00, 'description' => 'Price per KG', 'category' => 'Filler Materials'],
            ['name' => 'ALUMINIUM TIG ROD 3.2 MM CLASSIC WELD', 'retail_price' => 26.00, 'dealer_price' => 26.00, 'description' => 'Price per KG', 'category' => 'Filler Materials'],
            ['name' => 'CCMS TIG ROD 2.0 MM CLASSIC WELD', 'retail_price' => 9.00, 'dealer_price' => 9.00, 'description' => 'Price per KG', 'category' => 'Filler Materials'],
            ['name' => 'CCMS TIG ROD 2.5 MM CLASSIC WELD', 'retail_price' => 9.00, 'dealer_price' => 9.00, 'description' => 'Price per KG', 'category' => 'Filler Materials'],
            ['name' => 'CCMS TIG ROD 3.2 MM CLASSIC WELD', 'retail_price' => 9.00, 'dealer_price' => 9.00, 'description' => 'Price per KG', 'category' => 'Filler Materials'],

            // TUNGSTEN RODS (Missing price in prompt, setting to 0)
            ['name' => 'TUNGSTEN ROD GREEN 1.6 X 175 MM', 'retail_price' => 0.00, 'dealer_price' => 0.00, 'description' => 'Price per PKT', 'category' => 'Filler Materials'],
            ['name' => 'TUNGSTEN ROD GREEN 2.4 X 175 MM', 'retail_price' => 0.00, 'dealer_price' => 0.00, 'description' => 'Price per PKT', 'category' => 'Filler Materials'],
            ['name' => 'TUNGSTEN ROD GREEN 3.2 X 175 MM', 'retail_price' => 0.00, 'dealer_price' => 0.00, 'description' => 'Price per PKT', 'category' => 'Filler Materials'],
            ['name' => 'TUNGSTEN ROD RED 1.6 X 175 MM', 'retail_price' => 0.00, 'dealer_price' => 0.00, 'description' => 'Price per PKT', 'category' => 'Filler Materials'],
            ['name' => 'TUNGSTEN ROD RED 2.4 X 175 MM', 'retail_price' => 0.00, 'dealer_price' => 0.00, 'description' => 'Price per PKT', 'category' => 'Filler Materials'],
            ['name' => 'TUNGSTEN ROD RED 3.2X 175 MM', 'retail_price' => 0.00, 'dealer_price' => 0.00, 'description' => 'Price per PKT', 'category' => 'Filler Materials'],

            // TIG TORCH & MIG TORCH
            ['name' => 'TIG TORCH WP18 FV-4 MTR CLASSIC WELD CW-WP-18-FV-4 MTR', 'retail_price' => 130.00, 'dealer_price' => 130.00, 'category' => 'Torches'],
            ['name' => 'TIG TORCH WP26 FV-4 MTR CLASSIC WELD CW-WP-26-FV-4 MTR', 'retail_price' => 140.00, 'dealer_price' => 140.00, 'category' => 'Torches'],
            ['name' => 'TIG TORCH WP26 FV 8-MTR CLASSIC WELD CW-WP-26-FV-8 MTR', 'retail_price' => 205.00, 'dealer_price' => 205.00, 'category' => 'Torches'],
            ['name' => 'TIG TORCH HEAD CW-26 FV CLASSIC WELD CW-26-FV', 'retail_price' => 28.00, 'dealer_price' => 28.00, 'category' => 'Torches'],
            ['name' => 'TIG REMOTE SWITCH B-1P CLASSIC WELD CW-B-1P', 'retail_price' => 8.00, 'dealer_price' => 8.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH 15AK 3 MTR CLASSIC WELD CW-15AK-3 MTR', 'retail_price' => 130.00, 'dealer_price' => 130.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH 25AK 3 MTR CLASSIC WELD CW-25AK-3 MTR', 'retail_price' => 185.00, 'dealer_price' => 185.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH 25AK 4 MTR CLASSIC WELD CW-25AK-4 MTR', 'retail_price' => 205.00, 'dealer_price' => 205.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH 36KD 3 MTR CLASSIC WELD CW-36 KD-3 MTR', 'retail_price' => 220.00, 'dealer_price' => 220.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH 36KD 3 MTR CLASSIC WELD CW-36 KD-4 MTR', 'retail_price' => 250.00, 'dealer_price' => 250.00, 'category' => 'Torches'], // Text has 36KD-4 MTR as part number
            ['name' => 'MIG TORCH 501D 3 MTR CLASSIC WELD CW-501D - 3MTR', 'retail_price' => 320.00, 'dealer_price' => 320.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH 501D 4 MTR CLASSIC WELD CW-501D - 4MTR', 'retail_price' => 360.00, 'dealer_price' => 360.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH PSF 250 4.5 MTR CLASSIC WELD CW-PSF-250-4.5 MTR', 'retail_price' => 220.00, 'dealer_price' => 220.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH PSF 310 4.5 MTR CLASSIC WELD CW-PSF-310-4.5 MTR', 'retail_price' => 280.00, 'dealer_price' => 280.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH PSF 405 4.5 MTR CLASSIC WELD CW-PSF-405-4.5 MTR', 'retail_price' => 350.00, 'dealer_price' => 350.00, 'category' => 'Torches'],
            ['name' => 'MIG TORCH Q30 4 MTR CLASSIC WELD CW-Q30 -4MTR', 'retail_price' => 375.00, 'dealer_price' => 375.00, 'category' => 'Torches'],

            // GAS LENCE, INSULATORS, LINERS
            ['name' => 'GAS LENCE 45V64 2.4 MM CLASSIC WELD CW-45V64', 'retail_price' => 12.00, 'dealer_price' => 12.00, 'category' => 'Torch Spares'],
            ['name' => 'GAS LENCE 995795 3.2 MM CLASSIC WELD CW-995795', 'retail_price' => 12.00, 'dealer_price' => 12.00, 'category' => 'Torch Spares'],
            ['name' => 'GAS LENCE 45V26 2.4 MM CLASSIC WELD CW-45V26', 'retail_price' => 8.50, 'dealer_price' => 8.50, 'category' => 'Torch Spares'],
            ['name' => 'GAS LENCE 45V27 3.2 MM CLASSIC WELD CW-45V27', 'retail_price' => 8.50, 'dealer_price' => 8.50, 'category' => 'Torch Spares'],
            ['name' => 'PANASONIC INSULARTOR 350A CLASSIC WELD CW-350-A', 'retail_price' => 5.00, 'dealer_price' => 5.00, 'category' => 'Torch Spares'],
            ['name' => 'PANASONIC INSULARTOR 500A CLASSIC WELD CW-500-A', 'retail_price' => 6.00, 'dealer_price' => 6.00, 'category' => 'Torch Spares'],
            ['name' => 'STILL LINER 4.5 MTS RED 1.0-1.2 MM CLASSIC WELD CW-1.0-1.2-4.5 MTR', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Torch Spares'],
            ['name' => 'STILL LINER 4.5 MTS BLUE 0.6-0.8 MM CLASSIC WELD CW-0.6-0.8-4.5 MTR', 'retail_price' => 14.00, 'dealer_price' => 14.00, 'category' => 'Torch Spares'],
            ['name' => 'TEFLON LINER 4.5 MTS RED 1.0-1.2 MM CLASSIC WELD CW-1.0-1.2- MTR', 'retail_price' => 4.00, 'dealer_price' => 4.00, 'description' => 'Price PER MTR', 'category' => 'Torch Spares'],
            ['name' => 'TEFLON LINER 4.5 MTS BLUE 0.6-0.8 MM CLASSIC WELD CW-0.6-0.8 MTR', 'retail_price' => 4.00, 'dealer_price' => 4.00, 'description' => 'Price PER MTR', 'category' => 'Torch Spares'],

            // CERAMIC NOZZLES
            ['name' => 'CERAMIC NOZZLE 10N50-4L CLASSIC WELD CW-10N50-4L', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 10N49-5L CLASSIC WELD CW-10N49-5L', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 10N48-6L CLASSIC WELD CW-10N48-6L', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 10N47-7L CLASSIC WELD CW-10N47-7L', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 10N46-8L CLASSIC WELD CW-10N46-8L', 'retail_price' => 3.50, 'dealer_price' => 3.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 54N18-4 CLASSIC WELD CW-54N18-4', 'retail_price' => 2.50, 'dealer_price' => 2.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 54N17 -5 CLASSIC WELD CW-54N17-5', 'retail_price' => 2.50, 'dealer_price' => 2.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 54N16- 6 CLASSIC WELD CW-54N16-6', 'retail_price' => 2.50, 'dealer_price' => 2.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 54N15- 7 CLASSIC WELD CW-54N15-7', 'retail_price' => 2.50, 'dealer_price' => 2.50, 'category' => 'Torch Spares'],
            ['name' => 'CERAMIC NOZZLE 54N15- 8 CLASSIC WELD CW-54N14-8', 'retail_price' => 2.50, 'dealer_price' => 2.50, 'category' => 'Torch Spares'],

            // OTHER
            ['name' => 'TIP HOLDER OTC 500 CLASSIC WELD CW-OTC-500', 'retail_price' => 6.00, 'dealer_price' => 6.00, 'category' => 'Torch Spares'],
            ['name' => 'GOUGING TORCH K4000-2.1 MTR CW-K4000', 'retail_price' => 290.00, 'dealer_price' => 290.00, 'category' => 'Torches'],
        ];

        foreach ($products as $productData) {
            Product::create([
                'name' => $productData['name'],
                'description' => $productData['description'] ?? 'Classic Weld Trading LLC Product',
                'retail_price' => $productData['retail_price'],
                'dealer_price' => $productData['dealer_price'],
                'moq' => 1,
                'category' => $productData['category'] ?? 'General',
                'stock' => 100, // Default stock
                'image' => (function() use ($productData) {
                    $map = [
                        'CW-WC-21P' => 'welding-cutting-set-21p.jpg',
                        'CW-CA-212' => 'cutting-attachment-cw-ca-222.jpg',
                        'CW-CA-222' => 'cutting-attachment-cw-ca-222.jpg',
                        'CW-TH-211' => 'torch-handle-cw-th-211.jpg',
                        'CW-TH-221' => 'torch-handle-cw-th-221.jpg',
                        'CW-WN-1,' => 'welding-nozzle-1.jpg',
                        'CW-WN-5,' => 'welding-nozzle-5.jpg',
                        'CW-CN-GPN-00' => 'cutting-nozzle-gpn-00.jpg',
                        'CW-CN-GPN-1,' => 'cutting-nozzle-gpn-1.jpg',
                        'CW-CN-ANME-2' => 'cutting-nozzle-anme-2.jpg',
                        'CW-CN-00-1-101' => 'cutting-nozzle-1-101-00.jpg',
                        'CW-FA-288-R' => 'flashback-arrestor-oxy-288.jpg',
                        'CW-FA-288-L' => 'flashback-arrestor-ace-288.jpg',
                        'CW-FA-388-R' => 'flashback-arrestor-oxy-388.jpg',
                        'CW-FA-388-L' => 'flashback-arrestor-ace-388.jpg',
                        'CW-HN-8' => 'heating-nozzle-cw-hn-8.jpg',
                        'CW-AR-25-2FL' => 'argon-regulator-cw-ar-25-2fl.jpg',
                        'CW-AR-25-FL' => 'argon-regulator-cw-ar-25-fl.jpg',
                        'CW-AR-10M-2D' => 'argon-regulator-cw-ar-10m-2d.jpg',
                        'CW-CD-25-FL' => 'co2-regulator-cw-cd-25-fl.jpg',
                        'CW-N2-50M-2D' => 'nitrogen-regulator-cw-n2-50m-2d.jpg',
                        'CW-EH-800A-J' => 'electrode-holder-japan-800a.jpg',
                        'CW-EH-600A-J' => 'electrode-holder-japan-600a.jpg',
                        'CW-WH-600A' => 'welding-holder-brass-600a.jpg',
                        'CW-WH-500A' => 'welding-holder-brass-500a.jpg',
                        'CW-EC-600' => 'earth-clamp-600a.jpg',
                        'CW-EC-500' => 'earth-clamp-500a.jpg',
                        'HT-350' => 'heating-torch-ht-350.jpg',
                        'CW-K4000' => 'gouging-torch-k4000.jpg',
                        'CW-WP-26-FV-4' => 'tig-torch-wp26fv-4m.jpg',
                        'CW-15AK-3' => 'mig-torch-15ak-3m.jpg',
                        'CW-25AK-3' => 'mig-torch-25ak-3m.jpg',
                        'CW-36 KD-3' => 'mig-torch-36kd-3m.jpg',
                        'CW-36 KD-4' => 'mig-torch-36kd-4m.jpg',
                        'CW-501D - 3MTR' => 'mig-torch-501d-3m.jpg',
                        'CW-PSF-250' => 'mig-torch-psf250-4.5m.jpg',
                        'CW-PSF-310' => 'mig-torch-psf310-4.5m.jpg',
                        'CW-PSF-405' => 'mig-torch-psf405-4.5m.jpg',
                        'CW-Q30' => 'mig-torch-q30-4m.jpg',
                        'CW-LPG-HD' => 'lpg-regulator-hd-2d.jpg',
                    ];
                    foreach ($map as $key => $img) {
                        if (str_contains($productData['name'], $key)) return $img;
                    }
                    return 'default.png';
                })(),
            ]);
        }
    }
}

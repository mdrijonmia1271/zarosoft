<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = [
            [
                'name' => 'ZaroERP',
                'tagline' => 'Complete Intelligent Enterprise Resource Planning Suite',
                'status' => 'Enterprise Ready',
                'badge_color' => 'bg-emerald-500/10 text-emerald-400 border-emerald-500/30',
                'description' => 'A modular ERP system connecting manufacturing, inventory, procurement, accounts, and human resources with zero per-user license fees.',
                'highlights' => ['Shop-Floor BOM Scheduling', 'Multi-Branch Inventory & Barcodes', 'Double-Entry Automated Accounts', 'Real-Time Executive Analytics'],
                'demo_url' => 'https://demo.zarosoft.com/erp',
                'icon' => 'layers',
            ],
            [
                'name' => 'ZaroCRM',
                'tagline' => 'High-Velocity Sales Pipeline & Omnichannel Lead CRM',
                'status' => 'Enterprise Ready',
                'badge_color' => 'bg-blue-500/10 text-blue-400 border-blue-500/30',
                'description' => 'Visual Kanban deal tracking, automated follow-up sequences, WhatsApp/Email integration, and deal closing analytics.',
                'highlights' => ['Kanban Sales Stages', 'One-Click Quotation PDF', 'Email & WhatsApp Sync', 'Sales Team Commission Metrics'],
                'demo_url' => 'https://demo.zarosoft.com/crm',
                'icon' => 'users',
            ],
            [
                'name' => 'ZaroPOS',
                'tagline' => 'Lightning-Fast Cloud Point-of-Sale with Offline Support',
                'status' => 'Enterprise Ready',
                'badge_color' => 'bg-purple-500/10 text-purple-400 border-purple-500/30',
                'description' => 'Designed for busy retail outlets and restaurants. Features 1-second barcode billing, cash drawer sync, and customer loyalty rewards.',
                'highlights' => ['Offline Billing Cache', 'Thermal Receipt Printing', 'Barcode Scanner Support', 'Multi-Outlet Stock Sync'],
                'demo_url' => 'https://demo.zarosoft.com/pos',
                'icon' => 'shopping-cart',
            ],
            [
                'name' => 'ZaroHR',
                'tagline' => 'Automated Payroll, Biometric Attendance & Employee Portal',
                'status' => 'Enterprise Ready',
                'badge_color' => 'bg-cyan-500/10 text-cyan-400 border-cyan-500/30',
                'description' => 'Simplify employee life-cycles. Automated salary disbursement calculations, tax deductions, leave approvals, and biometric machine sync.',
                'highlights' => ['Biometric Machine Integration', 'One-Click Bank Payroll Sheet', 'Employee Self-Service App', 'Automated Tax & PF Calculations'],
                'demo_url' => 'https://demo.zarosoft.com/hr',
                'icon' => 'briefcase',
            ],
            [
                'name' => 'ZaroInventory',
                'tagline' => 'Smart Warehouse Automation & Low-Stock Forecaster',
                'status' => 'Coming Soon',
                'badge_color' => 'bg-amber-500/10 text-amber-400 border-amber-500/30',
                'description' => 'Intelligent stock replenishment algorithms that predict demand spikes and prevent overstocking or stockouts across regional hubs.',
                'highlights' => ['Automated Re-order Alerts', 'Batch & Expiry Management', 'Warehouse Bin Allocation', 'Inter-Branch Stock Transfer'],
                'demo_url' => null,
                'icon' => 'package',
            ],
            [
                'name' => 'ZaroAI',
                'tagline' => 'Autonomous Document OCR & Enterprise Knowledge Chatbot',
                'status' => 'Coming Soon',
                'badge_color' => 'bg-pink-500/10 text-pink-400 border-pink-500/30',
                'description' => 'Self-hosted AI engine that extracts data from vendor documents, analyzes financial health, and answers staff inquiries instantly.',
                'highlights' => ['Scanned Invoice OCR Extraction', 'Internal Knowledge RAG Chat', 'Anomaly & Fraud Detection', 'Custom API Connectors'],
                'demo_url' => null,
                'icon' => 'cpu',
            ],
        ];

        return view('products.index', compact('products'));
    }
}

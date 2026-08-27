<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class SolutionController extends Controller
{
    public function index()
    {
        $industries = [
            [
                'slug' => 'manufacturing',
                'name' => 'Manufacturing & Heavy Industries',
                'icon' => 'factory',
                'headline' => 'Complete Shop-Floor to Balance Sheet Automation',
                'summary' => 'Connect raw material sourcing, automated Bill of Materials (BOM), production batch tracking, inventory, and automated general ledger.',
                'features' => ['BOM Management', 'Batch Production Scheduling', 'Machine Downtime Logs', 'Multi-Warehouse Inventory', 'Automated Cost Accounting'],
                'color' => 'from-blue-600 to-indigo-600',
            ],
            [
                'slug' => 'retail-ecommerce',
                'name' => 'Retail & E-Commerce',
                'icon' => 'shopping-bag',
                'headline' => 'Omnichannel POS, Inventory & Flash Sale Systems',
                'summary' => 'Sync physical retail outlets with online storefronts. Handle rapid checkout, automated courier dispatch, and multi-tier loyalty points.',
                'features' => ['Cloud POS & Barcode Billing', 'Real-Time Stock Synchronization', 'Courier API Automation', 'Multi-Gateway Checkout', 'Customer Loyalty Engine'],
                'color' => 'from-purple-600 to-pink-600',
            ],
            [
                'slug' => 'healthcare',
                'name' => 'Healthcare & Clinical Centers',
                'icon' => 'activity',
                'headline' => 'Digital EHR, Telemedicine & Diagnostic Lab Automation',
                'summary' => 'Streamline doctor appointment schedules, electronic health records (EHR), pharmacy batch expiration alerts, and pathology reporting.',
                'features' => ['Electronic Health Records (EHR)', 'SMS Appointment Triage', 'Pathology Lab Reporting', 'Pharmacy Expiry POS', 'Doctor Digital Prescriptions'],
                'color' => 'from-emerald-600 to-teal-600',
            ],
            [
                'slug' => 'education',
                'name' => 'Education & Universities',
                'icon' => 'book-open',
                'headline' => 'Student Portals, Fee Automation & LMS Platforms',
                'summary' => 'Modern institutional management for schools, universities, and coaching academies with online fees, gradebooks, and digital classes.',
                'features' => ['Online Admission & Fee Gateway', 'Digital Attendance & SMS Alerts', 'Gradebook & Report Cards', 'Student / Parent Portal', 'Library & Asset Tracking'],
                'color' => 'from-amber-500 to-orange-600',
            ],
            [
                'slug' => 'finance-banking',
                'name' => 'FinTech, Microfinance & Corporate Banking',
                'icon' => 'credit-card',
                'headline' => 'Secure Microfinance Ledgers, Loan Disbursal & Wallets',
                'summary' => 'High-security financial software featuring automated loan interest calculations, biometric KYC authentication, and audit-ready reporting.',
                'features' => ['Double-Entry Microfinance Ledger', 'Automated EMI & Loan Calculator', 'Biometric & KYC Verification', 'Digital Wallet Architecture', 'Regulatory Compliance Audits'],
                'color' => 'from-cyan-600 to-blue-600',
            ],
            [
                'slug' => 'logistics',
                'name' => 'Logistics, Fleet & Supply Chain',
                'icon' => 'truck',
                'headline' => 'Real-Time Fleet Dispatch, GPS Tracking & Waybills',
                'summary' => 'Automate consignment booking, route optimization, driver trip manifests, fuel accounting, and automated customer tracking links.',
                'features' => ['Consignment & Waybill Generator', 'Driver Trip & Fuel Logs', 'Real-Time GPS Tracking API', 'Automated Delivery SMS', 'B2B Client Freight Portal'],
                'color' => 'from-rose-600 to-red-600',
            ],
        ];

        $projects = Project::where('is_active', true)->take(4)->get();

        return view('solutions.index', compact('industries', 'projects'));
    }
}

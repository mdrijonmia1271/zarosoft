<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\ContactRequest;
use App\Models\Faq;
use App\Models\Project;
use App\Models\ProjectCategory;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Admin User
        User::updateOrCreate(
            ['email' => 'admin@zarosoft.com'],
            [
                'name' => 'ZaroSoft Admin',
                'password' => Hash::make('password123'),
                'email_verified_at' => now(),
            ]
        );

        // 2. Settings
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'ZaroSoft', 'group' => 'general', 'label' => 'Website Name'],
            ['key' => 'site_tagline', 'value' => 'Smart Technology. Innovative Solutions.', 'group' => 'general', 'label' => 'Tagline'],
            ['key' => 'site_description', 'value' => 'ZaroSoft builds smart, reliable, and scalable technology solutions — from Custom ERPs and Enterprise Web Platforms to AI Automation and High-Impact Design.', 'group' => 'general', 'label' => 'Meta Description'],
            ['key' => 'company_email', 'value' => 'contact@zarosoft.com', 'group' => 'contact', 'label' => 'Company Email'],
            ['key' => 'company_phone', 'value' => '+880 1700-000000', 'group' => 'contact', 'label' => 'Company Phone'],
            ['key' => 'company_address', 'value' => 'Level 8, Software Technology Park, Dhaka, Bangladesh', 'group' => 'contact', 'label' => 'Office Address'],
            ['key' => 'working_hours', 'value' => 'Sun - Thu: 9:00 AM - 7:00 PM (GMT+6)', 'group' => 'contact', 'label' => 'Working Hours'],
            // Social Links
            ['key' => 'social_linkedin', 'value' => 'https://linkedin.com/company/zarosoft', 'group' => 'social', 'label' => 'LinkedIn Profile'],
            ['key' => 'social_github', 'value' => 'https://github.com/zarosoft', 'group' => 'social', 'label' => 'GitHub Profile'],
            ['key' => 'social_facebook', 'value' => 'https://facebook.com/zarosoft', 'group' => 'social', 'label' => 'Facebook Page'],
            ['key' => 'social_twitter', 'value' => 'https://twitter.com/zarosoft', 'group' => 'social', 'label' => 'Twitter / X'],
            // Statistics
            ['key' => 'stat_projects_completed', 'value' => '45+', 'group' => 'general', 'label' => 'Projects Completed'],
            ['key' => 'stat_happy_clients', 'value' => '30+', 'group' => 'general', 'label' => 'Happy Clients'],
            ['key' => 'stat_uptime', 'value' => '99.9%', 'group' => 'general', 'label' => 'System Reliability'],
            ['key' => 'stat_team_experience', 'value' => '7+', 'group' => 'general', 'label' => 'Years Combined Experience'],
        ];

        foreach ($settings as $setting) {
            Setting::updateOrCreate(['key' => $setting['key']], $setting);
        }

        // 3. Team Members (4 Founders)
        $founders = [
            [
                'name' => 'Mohammad Zaid',
                'designation' => 'Founder & Chief Executive Officer (CEO)',
                'role_title' => 'Strategy & Vision',
                'bio' => 'Visionary technology entrepreneur dedicated to empowering growing businesses through strategic software architecture, scalable web solutions, and automated operations.',
                'avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=400&auto=format&fit=crop&q=80',
                'email' => 'zaid@zarosoft.com',
                'phone' => '+880 1700-111111',
                'linkedin_url' => 'https://linkedin.com',
                'github_url' => 'https://github.com',
                'twitter_url' => 'https://twitter.com',
                'skills' => ['Strategic Leadership', 'Enterprise Architecture', 'Business Automation', 'SaaS Growth'],
                'is_founder' => true,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Tanvir Ahmed',
                'designation' => 'Co-Founder & Chief Technology Officer (CTO)',
                'role_title' => 'Architecture & Cloud Engineering',
                'bio' => 'High-performance backend architect with deep specialization in cloud-native infrastructure, distributed Laravel ecosystems, Docker orchestration, and microservices.',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&auto=format&fit=crop&q=80',
                'email' => 'tanvir@zarosoft.com',
                'phone' => '+880 1700-222222',
                'linkedin_url' => 'https://linkedin.com',
                'github_url' => 'https://github.com',
                'twitter_url' => 'https://twitter.com',
                'skills' => ['Distributed Systems', 'Laravel / PHP', 'Cloud Infrastructure', 'DevOps & Security'],
                'is_founder' => true,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'name' => 'Rakibul Hasan',
                'designation' => 'Co-Founder & Lead Solutions Engineer',
                'role_title' => 'Full-Stack & AI Integration',
                'bio' => 'Full-stack craftsman specializing in complex custom ERP modules, real-time database optimization in MySQL, AI document OCR pipelines, and robust RESTful APIs.',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&auto=format&fit=crop&q=80',
                'email' => 'rakibul@zarosoft.com',
                'phone' => '+880 1700-333333',
                'linkedin_url' => 'https://linkedin.com',
                'github_url' => 'https://github.com',
                'twitter_url' => 'https://twitter.com',
                'skills' => ['Custom ERP Systems', 'AI & OCR Integration', 'MySQL Performance', 'Vue & React'],
                'is_founder' => true,
                'order' => 3,
                'is_active' => true,
            ],
            [
                'name' => 'Sabbir Hossain',
                'designation' => 'Co-Founder & Head of Product & Experience',
                'role_title' => 'UI/UX & Creative Strategy',
                'bio' => 'Human-centered product designer turning complex business workflows into seamless, pixel-perfect digital experiences, cohesive brand identities, and high-conversion interfaces.',
                'avatar' => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=400&auto=format&fit=crop&q=80',
                'email' => 'sabbir@zarosoft.com',
                'phone' => '+880 1700-444444',
                'linkedin_url' => 'https://linkedin.com',
                'github_url' => 'https://github.com',
                'twitter_url' => 'https://twitter.com',
                'skills' => ['UI/UX Design Systems', 'Product Strategy', 'Brand Identity', 'Motion Graphics'],
                'is_founder' => true,
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($founders as $founder) {
            TeamMember::updateOrCreate(['name' => $founder['name']], $founder);
        }

        // 4. Service Categories
        $devCategory = ServiceCategory::updateOrCreate(
            ['slug' => 'development'],
            [
                'name' => 'Software Development & Engineering',
                'subtitle' => 'End-to-End Custom Software, Cloud Applications & AI Systems',
                'description' => 'From bespoke ERP platforms and SaaS applications to mobile apps and AI automation, we engineer robust digital products built for scale and reliability.',
                'order' => 1,
                'is_active' => true,
            ]
        );

        $designCategory = ServiceCategory::updateOrCreate(
            ['slug' => 'design-creative'],
            [
                'name' => 'Design & Creative Solutions',
                'subtitle' => 'Modern UI/UX, Visual Branding & High-Impact Digital Assets',
                'description' => 'Crafting memorable brand identities, intuitive user experiences, and stunning digital media that captivate customers and elevate your brand presence.',
                'order' => 2,
                'is_active' => true,
            ]
        );

        // 5. Services (10 Dev + 7 Design)
        $services = [
            // Development Services
            [
                'service_category_id' => $devCategory->id,
                'title' => 'Website Development',
                'slug' => 'website-development',
                'icon' => 'globe',
                'badge' => 'High Demand',
                'short_description' => 'Modern, lightning-fast, and responsive web applications built with Laravel, Blade, and modern frontend stacks tailored for high conversion.',
                'description' => 'We engineer bespoke websites and web portals that combine stunning aesthetic presentation with rock-solid server-side performance. Whether you need a corporate web presence, a client portal, or an interactive web application, our solutions are built with clean architecture, SEO readiness, and airtight security.',
                'features' => [
                    'Custom responsive layouts optimized for all screens',
                    'High-speed server rendering with Laravel & Blade',
                    'Search Engine Optimization (SEO) & OpenGraph built-in',
                    'Integrated Contact & Lead Management pipeline',
                    'Enterprise-grade security and SSL protection',
                ],
                'tech_stack' => ['Laravel', 'Blade', 'Tailwind CSS', 'Alpine.js', 'MySQL', 'Vite'],
                'benefits' => [
                    'Blazing fast page load times under 1 second',
                    'Easy content management with tailored admin dashboard',
                    'Mobile-first responsive experience',
                    'Higher Google search rankings with structured data',
                ],
                'process_steps' => ['Requirement Gathering & Wireframing', 'UI/UX Interactive Mockups', 'Laravel Backend & Blade Slicing', 'QA Testing & Cross-Browser Audit', 'Cloud Deployment & Launch'],
                'deliverables' => ['Complete Source Code', 'Admin Management Panel', 'SEO Metadata Setup', '1 Year Free Technical Support'],
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'Mobile App Development',
                'slug' => 'mobile-app-development',
                'icon' => 'smartphone',
                'badge' => 'Cross-Platform',
                'short_description' => 'Native and cross-platform Android and iOS applications with fluid 60fps animations and resilient offline data synchronization.',
                'description' => 'Turn your ideas into frictionless mobile apps. We develop native-feel mobile applications using Flutter and React Native backed by high-speed Laravel RESTful APIs, providing seamless user onboarding, push notifications, and biometric authentication.',
                'features' => [
                    'Single codebase for both Android and iOS',
                    'Smooth 60fps native performance and gestures',
                    'Offline caching and real-time synchronization',
                    'Integrated push notifications and deep linking',
                    'Secure payment gateway and biometric login',
                ],
                'tech_stack' => ['Flutter', 'Dart', 'React Native', 'Laravel REST API', 'Firebase', 'PostgreSQL'],
                'benefits' => [
                    'Reduced development cost with cross-platform code',
                    'Rapid time to market on Google Play & App Store',
                    'Delightful, responsive user experience',
                ],
                'process_steps' => ['User Journey Mapping', 'Mobile UI Prototyping', 'App & API Development', 'Device Testing & Performance Profiling', 'Store Publishing & Submission'],
                'deliverables' => ['iOS & Android Production Builds', 'API Documentation', 'Source Code Repository', 'Store Asset Kit'],
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'E-commerce Development',
                'slug' => 'e-commerce-development',
                'icon' => 'shopping-cart',
                'badge' => 'Revenue Driver',
                'short_description' => 'Custom, high-throughput digital commerce platforms with automated inventory, multi-currency checkout, and courier API integration.',
                'description' => 'Scale your online retail business with enterprise-grade e-commerce software. We build tailored e-commerce engines designed to handle heavy flash sales, complex multi-warehouse inventory, promotional discounts, and localized payment gateways.',
                'features' => [
                    'Lightning-fast product search and multi-faceted filtering',
                    'Multi-channel inventory management & stock alerts',
                    'Secure multi-gateway checkout (Stripe, SSLCommerz, bKash, PayPal)',
                    'Automated courier logistics tracking API',
                    'Customer order tracking, refund management, and automated invoices',
                ],
                'tech_stack' => ['Laravel', 'MySQL', 'Redis Caching', 'Tailwind CSS', 'Stripe', 'SSLCommerz API'],
                'benefits' => [
                    'Zero revenue leakage with bulletproof checkout flows',
                    'Ability to handle 10,000+ simultaneous shoppers',
                    'Automated courier parcel booking and shipping labels',
                ],
                'process_steps' => ['Catalog & Checkout Architecture', 'Storefront UI/UX Design', 'Cart & Payment Engine Integration', 'Load & Stress Testing', 'Launch & Staff Training'],
                'deliverables' => ['Complete E-Commerce Store', 'Admin Inventory & Sales Dashboard', 'Payment Gateway Integration', 'Courier API Automation'],
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'ERP Development',
                'slug' => 'erp-development',
                'icon' => 'layers',
                'badge' => 'Core Strength',
                'short_description' => 'Comprehensive enterprise resource planning software connecting manufacturing, inventory, supply chain, accounts, and human resources.',
                'description' => 'Eliminate departmental silos and manual spreadsheets with our flagship custom ERP solutions. We engineer modular, role-based ERP systems customized exactly around your factory, warehouse, and operational workflows.',
                'features' => [
                    'Production & Bill of Materials (BOM) management',
                    'Multi-warehouse real-time inventory tracking with barcode scanning',
                    'Purchase orders, vendor evaluation & procurement workflow',
                    'Double-entry automated accounting, trial balance & P&L',
                    'HR, attendance, payroll calculation, and role-based permissions',
                ],
                'tech_stack' => ['Laravel 12', 'MySQL High Concurrency', 'Redis', 'Tailwind CSS', 'Alpine.js', 'Chart.js'],
                'benefits' => [
                    'Up to 40% reduction in operational overhead',
                    'Real-time transparency across all departments',
                    '100% data ownership on private cloud servers',
                ],
                'process_steps' => ['Deep Business Workflow Analysis', 'Data Modeling & Architecture Blueprint', 'Module-by-Module Sprint Development', 'User Acceptance Testing & Data Migration', 'On-Site / Remote Training & Deployment'],
                'deliverables' => ['Complete Modular ERP Platform', 'Role-Based Access Control System', 'Automated Daily Financial Reports', 'Comprehensive User Manual & Video Tutorials'],
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'CRM Development',
                'slug' => 'crm-development',
                'icon' => 'users',
                'badge' => 'Sales Acceleration',
                'short_description' => 'Intelligent customer relationship management platforms to track leads, automate sales pipelines, and boost customer retention.',
                'description' => 'Empower your sales and support teams with a centralized CRM designed to close deals faster. Track communications across email, phone, and messaging apps while analyzing pipeline velocity in real time.',
                'features' => [
                    'Visual Kanban sales pipeline with drag-and-drop stages',
                    'Automated lead routing, follow-up reminders, and activity logs',
                    'Omnichannel communication history (Email, SMS, WhatsApp)',
                    'Customer 360-degree timeline and deal value forecasting',
                    'Custom quotation and invoice generation in 1 click',
                ],
                'tech_stack' => ['Laravel', 'MySQL', 'Tailwind CSS', 'Alpine.js', 'WebSockets'],
                'benefits' => [
                    '35% increase in lead-to-deal conversion rates',
                    'No lost leads or missed customer follow-ups',
                    'Instant visibility into sales rep performance',
                ],
                'process_steps' => ['Sales Pipeline Discovery', 'Custom Stage & Field Setup', 'CRM Engine Development', 'Integration with Email/WhatsApp', 'Rollout & Adoption'],
                'deliverables' => ['Full CRM System', 'Lead Import Tools', 'Custom Reporting Widgets', 'Team Training Session'],
                'is_featured' => false,
                'order' => 5,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'Custom Software Development',
                'slug' => 'custom-software-development',
                'icon' => 'code',
                'badge' => 'Tailor-Made',
                'short_description' => 'Bespoke software applications engineered from scratch to resolve your specific business bottlenecks without unnecessary bloated code.',
                'description' => 'Off-the-shelf software rarely fits intricate business models. We build bespoke software solutions from scratch that adapt seamlessly to your exact company rules, operational compliance, and future roadmap.',
                'features' => [
                    '100% custom architecture designed for your unique rules',
                    'Modular scalability without paying per-user license fees',
                    'Seamless integration with legacy databases and third-party APIs',
                    'Comprehensive role permissions and detailed audit logs',
                ],
                'tech_stack' => ['Laravel', 'PHP 8.3+', 'MySQL / PostgreSQL', 'Tailwind CSS', 'Docker', 'Redis'],
                'benefits' => [
                    'Total intellectual property (IP) and code ownership',
                    'Elimination of monthly recurring SaaS seat fees',
                    'Competitive advantage with proprietary workflows',
                ],
                'process_steps' => ['Problem Discovery & Feasibility Study', 'Technical Specification & Architecture', 'Agile Sprint Implementation', 'Quality Assurance & Security Auditing', 'Deployment & Ongoing Scaling'],
                'deliverables' => ['Full Intellectual Property (IP)', 'Clean Documented Source Code', 'Automated Database Backup System', 'Ongoing SLA Support'],
                'is_featured' => false,
                'order' => 6,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'SaaS Development',
                'slug' => 'saas-development',
                'icon' => 'cloud',
                'badge' => 'Scalable Products',
                'short_description' => 'Multi-tenant cloud Software-as-a-Service architectures engineered for high concurrency, automated billing, and rapid subscriber growth.',
                'description' => 'Launch your SaaS product with confidence. We engineer multi-tenant cloud platforms featuring database isolation, automated recurring subscriptions via Stripe, tenant onboarding, usage metering, and team management.',
                'features' => [
                    'Robust multi-tenancy architecture (database or schema separation)',
                    'Automated subscription billing, trial periods, and tier upgrading',
                    'Role management, team invitations, and user permissions',
                    'Tenant analytics, churn monitoring, and usage dashboards',
                ],
                'tech_stack' => ['Laravel Cashier', 'Stripe Billing', 'MySQL / PostgreSQL', 'Redis', 'Docker', 'AWS'],
                'benefits' => [
                    'Rapid MVP launch to test market validation',
                    'Effortless scaling from 10 to 100,000 active tenants',
                    'Automated revenue collection with zero manual intervention',
                ],
                'process_steps' => ['Product Architecture & Multi-Tenancy Design', 'Subscription Engine Setup', 'Core Feature Development', 'Load Testing & Security Audits', 'Go-To-Market Deployment'],
                'deliverables' => ['Turnkey SaaS Application', 'Stripe Billing Integration', 'Tenant Onboarding Portal', 'Developer API Documentation'],
                'is_featured' => true,
                'order' => 7,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'AI Solutions',
                'slug' => 'ai-solutions',
                'icon' => 'cpu',
                'badge' => 'Next-Gen',
                'short_description' => 'Intelligent AI chatbots, automated document OCR, predictive business analytics, and seamless OpenAI/LLM integrations.',
                'description' => 'Bring the power of artificial intelligence into your daily operations. From smart customer service chatbots that handle 80% of routine inquiries to automated document OCR that extracts data from invoices into your ERP, we make AI practical and profitable.',
                'features' => [
                    'Context-aware AI Chatbots trained on your company knowledge base',
                    'Intelligent Document OCR & data extraction for invoices and receipts',
                    'Predictive analytics for sales forecasting and inventory demand',
                    'Automated text generation, summarization, and sentiment analysis',
                ],
                'tech_stack' => ['Python', 'OpenAI API', 'LangChain', 'Tesseract OCR', 'Laravel API', 'PostgreSQL'],
                'benefits' => [
                    '80%+ reduction in repetitive manual data entry',
                    '24/7 instant customer service response with zero human delay',
                    'Smarter data-driven business decisions',
                ],
                'process_steps' => ['Use-Case Feasibility Assessment', 'Data Preparation & Model Tuning', 'API Integration with Core Software', 'Accuracy Verification & Safety Guardrails', 'Deployment & Monitoring'],
                'deliverables' => ['AI Engine Integration', 'Knowledge Base Training Script', 'Analytics Dashboard', 'API Access Keys'],
                'is_featured' => true,
                'order' => 8,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'Cloud Solutions',
                'slug' => 'cloud-solutions',
                'icon' => 'server',
                'badge' => 'Infrastructure',
                'short_description' => 'Resilient AWS and Linux cloud infrastructure setup, containerized Docker deployments, CI/CD pipelines, and 99.9% uptime architectures.',
                'description' => 'Ensure your systems never go down during critical business peaks. We design, deploy, and manage scalable cloud infrastructures, automated backup strategies, SSL certificates, load balancers, and continuous integration/deployment (CI/CD) pipelines.',
                'features' => [
                    'AWS / DigitalOcean / Linux cloud server configuration',
                    'Docker containerization and environment parity',
                    'Automated CI/CD deployment pipelines with GitHub Actions',
                    'Automated off-site database backups and disaster recovery',
                ],
                'tech_stack' => ['AWS EC2/S3', 'Docker', 'Linux / Ubuntu', 'Nginx', 'GitHub Actions', 'Cloudflare'],
                'benefits' => [
                    '99.9% server uptime and high fault tolerance',
                    'Instant push-to-deploy workflows without downtime',
                    'Optimized cloud server costs with resource rightsizing',
                ],
                'process_steps' => ['Infrastructure Audit', 'Architecture Blueprint & Cloud Provisioning', 'Dockerization & CI/CD Pipeline Build', 'Security Hardening & SSL', 'Monitoring & Backup Automation'],
                'deliverables' => ['Configured Cloud Servers', 'CI/CD Pipeline Configuration', 'Automated Backup Scripts', 'Disaster Recovery Plan'],
                'is_featured' => false,
                'order' => 9,
            ],
            [
                'service_category_id' => $devCategory->id,
                'title' => 'Software Maintenance & Support',
                'slug' => 'software-maintenance-support',
                'icon' => 'shield-check',
                'badge' => 'Long-Term',
                'short_description' => 'Dedicated ongoing technical support, security patching, performance optimization, and regular feature updates to keep your systems running smoothly.',
                'description' => 'Software requires continuous care to stay secure, fast, and compatible with evolving technologies. Our dedicated maintenance packages give you peace of mind with 24/7 uptime monitoring, security updates, bug fixes, and on-demand feature additions.',
                'features' => [
                    '24/7 Server uptime and error log monitoring',
                    'Regular framework, PHP, and security dependency patches',
                    'Database query optimization and index maintenance',
                    'Priority bug fixing and dedicated technical hotline',
                ],
                'tech_stack' => ['Laravel Pail', 'MySQL Optimization', 'Redis', 'Sentry', 'UptimeRobot'],
                'benefits' => [
                    'Zero unexpected system crashes or security vulnerabilities',
                    'Consistent sub-second application performance',
                    'Dedicated engineering team ready whenever you need',
                ],
                'process_steps' => ['System Health Check & Code Audit', 'Baseline Performance Optimization', 'Monitoring Agent Setup', 'Scheduled Monthly Maintenance & Reporting'],
                'deliverables' => ['Monthly Maintenance Reports', 'Security Audit Certificate', 'Guaranteed SLA Response Times', 'Dedicated Account Manager'],
                'is_featured' => false,
                'order' => 10,
            ],

            // Design & Creative Services
            [
                'service_category_id' => $designCategory->id,
                'title' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'icon' => 'layout',
                'badge' => 'User-Centered',
                'short_description' => 'Modern, intuitive, and conversion-optimized user interface and experience design created in Figma with interactive clickable prototypes.',
                'description' => 'Great software begins with intuitive design. We craft user interfaces that reduce cognitive friction, accelerate user adoption, and turn complex business workflows into delightful, effortless digital interactions.',
                'features' => [
                    'In-depth user journey mapping and information architecture',
                    'Interactive clickable wireframes and high-fidelity Figma prototypes',
                    'Scalable Design System with reusable UI components and tokens',
                    'Dark and Light mode harmonious color systems',
                ],
                'tech_stack' => ['Figma', 'FigJam', 'Adobe XD', 'Protopie', 'Tailwind Tokens'],
                'benefits' => [
                    'Higher user engagement and retention',
                    'Faster developer handoff with structured component specs',
                    'Reduced product development revisions and cost',
                ],
                'process_steps' => ['User Research & Competitor Analysis', 'Wireframing & UX Flows', 'High-Fidelity UI Design', 'Interactive Prototype Testing', 'Developer Design Token Handoff'],
                'deliverables' => ['Full Figma Source File', 'Interactive Prototype Link', 'Design System & Component Library', 'Developer Handoff Guide'],
                'is_featured' => true,
                'order' => 11,
            ],
            [
                'service_category_id' => $designCategory->id,
                'title' => 'Graphic Design',
                'slug' => 'graphic-design',
                'icon' => 'image',
                'badge' => 'Visual Impact',
                'short_description' => 'High-impact digital and print graphics, social media kits, advertising banners, and corporate presentation decks.',
                'description' => 'Elevate your brand communication across digital and print touchpoints. We design clean, modern graphics that convey professionalism, enhance marketing campaigns, and tell your brand story visually.',
                'features' => [
                    'Social media campaign visuals and carousel ad sets',
                    'Corporate presentation decks and pitch decks (PowerPoint / Keynote)',
                    'Marketing brochures, flyers, banners, and roll-up stands',
                    'Custom digital illustrations and infographics',
                ],
                'tech_stack' => ['Adobe Photoshop', 'Adobe Illustrator', 'Figma', 'InDesign'],
                'benefits' => [
                    'Consistent, memorable brand visuals across all channels',
                    'Higher social media engagement and click-through rates',
                    'Ready-to-print vector files with perfect color profiles',
                ],
                'process_steps' => ['Creative Brief & Moodboard', 'Concept Exploration', 'Design Refinement', 'Final Asset Export in All Required Formats'],
                'deliverables' => ['Editable Vector Source Files (AI / PSD)', 'Web-Optimized PNG/WebP', 'High-Res Print Ready PDFs'],
                'is_featured' => false,
                'order' => 12,
            ],
            [
                'service_category_id' => $designCategory->id,
                'title' => 'Logo Design',
                'slug' => 'logo-design',
                'icon' => 'target',
                'badge' => 'Memorable Marks',
                'short_description' => 'Distinctive, timeless, and mathematically balanced corporate logos crafted to make your brand instantly recognizable.',
                'description' => 'Your logo is the face of your business. We craft timeless logo marks built on golden-ratio principles, memorable symbolism, and crisp typography that work flawlessly on everything from website favicons to giant billboards.',
                'features' => [
                    '3 to 5 unique initial logo concepts to choose from',
                    'Mathematically balanced geometry and grid construction',
                    'Full color variations (Primary, Monochrome, Inverted, Dark/Light)',
                    'Favicon, app icon, and social avatar exports',
                ],
                'tech_stack' => ['Adobe Illustrator', 'Vector Geometry', 'FontLab'],
                'benefits' => [
                    'Instant brand recognition in crowded markets',
                    'Infinite vector scalability without loss of quality',
                    'Full commercial copyright ownership',
                ],
                'process_steps' => ['Brand Essence & Competitor Audit', 'Hand Sketching & Vectorization', 'Concept Presentation & Client Selection', 'Final Polish & Asset Generation'],
                'deliverables' => ['Vector Masters (AI, EPS, SVG)', 'High-Resolution PNGs & JPEGs', 'Logo Usage Guide'],
                'is_featured' => true,
                'order' => 13,
            ],
            [
                'service_category_id' => $designCategory->id,
                'title' => 'Brand Identity',
                'slug' => 'brand-identity',
                'icon' => 'award',
                'badge' => 'Complete System',
                'short_description' => 'Comprehensive visual brand guidelines including typography hierarchy, color palettes, stationery kits, and brand books.',
                'description' => 'Build an authoritative, cohesive brand that inspires trust. We develop complete visual identity systems that ensure every email, document, business card, and marketing campaign speaks with one unified, premium voice.',
                'features' => [
                    'Complete Brand Book & Style Guide PDF (40+ pages)',
                    'Curated corporate typography pairings and color palettes',
                    'Stationery suite (Business cards, letterheads, invoice templates)',
                    'Email signature, merchandise, and packaging guidelines',
                ],
                'tech_stack' => ['Adobe InDesign', 'Illustrator', 'Figma', 'Photoshop'],
                'benefits' => [
                    'Unified corporate image that builds enterprise trust',
                    'Clear guidelines for future internal and agency designers',
                    'Turnkey print-ready stationery templates',
                ],
                'process_steps' => ['Brand Strategy & Persona Definition', 'Visual Language Exploration', 'Brand Asset Design', 'Brand Guideline Compilation & Handoff'],
                'deliverables' => ['Comprehensive Brand Guidelines PDF', 'Stationery Print Files', 'Digital Asset Pack'],
                'is_featured' => true,
                'order' => 14,
            ],
            [
                'service_category_id' => $designCategory->id,
                'title' => 'Video Editing',
                'slug' => 'video-editing',
                'icon' => 'video',
                'badge' => 'Engaging Media',
                'short_description' => 'Cinematic business promos, SaaS product walkthroughs, social video ads, and YouTube content polished with high-end color grading.',
                'description' => 'Video is the highest-converting medium on the internet. We cut, polish, color grade, and sound-mix dynamic business videos that capture attention within the first 3 seconds and drive viewers to action.',
                'features' => [
                    'SaaS software screen recording and animated UI highlights',
                    'Cinematic color grading and sound design with licensed audio',
                    'Dynamic subtitles, kinetic typography, and callouts',
                    'Multi-ratio exports (16:9 for Web/YouTube, 9:16 for Reels/Shorts)',
                ],
                'tech_stack' => ['Adobe Premiere Pro', 'DaVinci Resolve', 'Audition'],
                'benefits' => [
                    'Up to 80% higher engagement compared to static graphics',
                    'Crisp 4K/1080p renders optimized for social platforms',
                    'Fast turnaround with structured revision rounds',
                ],
                'process_steps' => ['Storyboarding & Footage Review', 'Rough Cut & Pacing Sync', 'Color Grading & Sound Mixing', 'Motion Graphics & Subtitles', 'Final Master Render'],
                'deliverables' => ['4K/1080p Master Video Files', 'Short-form Social Cuts (Reels/TikTok)', 'Thumbnail Graphics'],
                'is_featured' => false,
                'order' => 15,
            ],
            [
                'service_category_id' => $designCategory->id,
                'title' => 'Motion Graphics',
                'slug' => 'motion-graphics',
                'icon' => 'zap',
                'badge' => 'Dynamic Animation',
                'short_description' => 'Engaging 2D/3D animated explainer videos, animated logo stingers, and Lottie animations for web and mobile interfaces.',
                'description' => 'Bring your brand and software to life with smooth, captivating motion design. We create animated explainer videos that simplify complex technical products and lightweight Lottie animations that delight users inside web and mobile apps.',
                'features' => [
                    'Animated logo reveals and YouTube intros/outros',
                    'High-conversion 60-second 2D animated product explainer videos',
                    'Lightweight JSON / Lottie animations for web app micro-interactions',
                    'Custom 3D isometric tech graphics and transitions',
                ],
                'tech_stack' => ['Adobe After Effects', 'Lottie / Bodymovin', 'Cinema 4D', 'Illustrator'],
                'benefits' => [
                    'Explains complex technical products in under 60 seconds',
                    'Micro-animations increase web app engagement by 40%',
                    'Ultra-small file sizes with vector Lottie JSON',
                ],
                'process_steps' => ['Scriptwriting & Voiceover Sync', 'Styleframes & Storyboarding', 'Keyframe Animation & Timing', 'Audio Effects Integration', 'Lottie / MP4 Export'],
                'deliverables' => ['Full HD / 4K Animation Videos', 'Web Lottie JSON Files', 'Looping GIF Previews'],
                'is_featured' => false,
                'order' => 16,
            ],
            [
                'service_category_id' => $designCategory->id,
                'title' => 'Creative Design',
                'slug' => 'creative-design',
                'icon' => 'sparkles',
                'badge' => 'Strategic Concept',
                'short_description' => 'Holistic creative direction, digital marketing concept creation, custom 3D web illustrations, and brand storytelling.',
                'description' => 'Stand out from generic corporate templates. Our creative design team blends artistic excellence with marketing psychology to produce digital assets and campaign concepts that captivate audiences and inspire brand loyalty.',
                'features' => [
                    'Creative advertising campaign concepts and hero visuals',
                    'Custom 3D illustration assets and futuristic glassmorphism graphics',
                    'Interactive web visual experiences and isometric art',
                    'Omnichannel creative direction for product launches',
                ],
                'tech_stack' => ['Blender 3D', 'Figma', 'Adobe Creative Cloud', 'Midjourney Pro / Firefly'],
                'benefits' => [
                    'Unique brand presence impossible to duplicate by competitors',
                    'Elevated brand perception commanding premium pricing',
                    'Seamless harmony across all marketing touchpoints',
                ],
                'process_steps' => ['Creative Strategy Workshop', 'Moodboard & Visual Concepting', '3D Asset Modeling & Composition', 'Integration across Web & Marketing'],
                'deliverables' => ['High-Res 3D / Creative Assets Pack', 'Campaign Visual Toolkit', 'License Rights Documentation'],
                'is_featured' => false,
                'order' => 17,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        // 6. Project Categories
        $catERP = ProjectCategory::updateOrCreate(['slug' => 'erp-crm'], ['name' => 'ERP & CRM Systems', 'order' => 1]);
        $catWeb = ProjectCategory::updateOrCreate(['slug' => 'web-saas'], ['name' => 'Web & SaaS Platforms', 'order' => 2]);
        $catMobile = ProjectCategory::updateOrCreate(['slug' => 'mobile-apps'], ['name' => 'Mobile Applications', 'order' => 3]);
        $catAI = ProjectCategory::updateOrCreate(['slug' => 'ai-automation'], ['name' => 'AI & Automation', 'order' => 4]);
        $catDesign = ProjectCategory::updateOrCreate(['slug' => 'design-branding'], ['name' => 'Design & Branding', 'order' => 5]);

        // 7. Case Studies / Projects
        $projects = [
            [
                'project_category_id' => $catERP->id,
                'title' => 'ZaroERP — Smart Manufacturing & Multi-Warehouse Suite',
                'slug' => 'zaro-erp-manufacturing-system',
                'client_name' => 'Apex Steel & Industrial Mills',
                'industry' => 'Industrial Manufacturing',
                'duration' => '4 Months',
                'tagline' => 'Automating shop-floor production lines, raw material demand forecasting, and real-time inventory.',
                'overview' => 'Apex Industrial Mills was losing significant revenue each month due to uncoordinated manual spreadsheets across 3 factory locations. ZaroSoft engineered a unified, high-concurrency custom ERP platform that connects the factory shop-floor directly to procurement, accounting, and sales dispatch.',
                'problem' => 'Frequent production bottlenecks caused by unpredicted raw material shortages, manual data entry errors between warehouse and accounts, and zero real-time visibility into factory production capacity.',
                'solution' => 'We built a bespoke modular ERP on Laravel 12 and MySQL featuring automated Bill of Materials (BOM) calculation, barcode-enabled inventory tracking, double-entry automated accounts, and automated purchase alerts.',
                'key_features' => [
                    'Automated Bill of Materials (BOM) & batch production scheduling',
                    'Multi-warehouse barcode stock management with mobile scanner support',
                    'Vendor procurement scoring and automated purchase requisition',
                    'Double-entry General Ledger, real-time balance sheets and P&L statements',
                    'Role-based permissions for 150+ factory operators and executives',
                ],
                'tech_stack' => ['Laravel 12', 'MySQL', 'Tailwind CSS', 'Alpine.js', 'Redis', 'Docker'],
                'results' => [
                    '45% reduction in factory production downtime',
                    '$280,000 estimated annual savings in avoided inventory spoilage',
                    '99.8% on-time customer order delivery rate',
                    'Financial closing cycle reduced from 14 days to 4 hours',
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&auto=format&fit=crop&q=80',
                'hero_image' => 'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=1600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80',
                ],
                'live_url' => 'https://demo.zarosoft.com/erp',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'project_category_id' => $catAI->id,
                'title' => 'NeuralBot — Enterprise AI Support & Automated Invoice OCR',
                'slug' => 'neuralbot-ai-document-ocr',
                'client_name' => 'FinGlobal Logistics Corp',
                'industry' => 'FinTech & Logistics',
                'duration' => '3 Months',
                'tagline' => 'Automated invoice data extraction with 99.4% accuracy and 24/7 autonomous customer triage.',
                'overview' => 'FinGlobal handled over 5,000 paper and PDF supplier invoices each week, requiring an army of data entry clerks. ZaroSoft developed an intelligent AI OCR processing pipeline alongside a custom RAG-powered customer chatbot.',
                'problem' => 'Manual invoice processing took an average of 4.5 days per batch with high human typo rates, while customer support tickets experienced 6+ hour delays.',
                'solution' => 'We integrated Python OCR models with Laravel backend APIs to automatically extract vendor details, line items, and tax totals into the central financial ledger, while deploying a specialized AI chatbot for customer inquiries.',
                'key_features' => [
                    'Computer vision OCR capable of reading multi-page skewed PDF invoices',
                    'Automated 3-way matching between Purchase Order, Goods Receipt, and Invoice',
                    'Context-aware AI support bot trained on 10,000+ support historical tickets',
                    'Real-time anomaly detection for duplicate or fraudulent invoices',
                ],
                'tech_stack' => ['Python', 'Tesseract OCR', 'OpenAI API', 'Laravel', 'PostgreSQL', 'Tailwind CSS'],
                'results' => [
                    '95% reduction in invoice reconciliation time (from 4 days to 3 minutes)',
                    '82% of customer support queries resolved autonomously',
                    'Zero manual transcription errors reported since launch',
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=800&auto=format&fit=crop&q=80',
                'hero_image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=1600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=800&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1677442136019-21780ecad995?w=800&auto=format&fit=crop&q=80',
                ],
                'live_url' => 'https://demo.zarosoft.com/ai-bot',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'project_category_id' => $catWeb->id,
                'title' => 'OmniStore — High-Throughput B2B & B2C E-Commerce Platform',
                'slug' => 'omnistore-b2b-ecommerce-platform',
                'client_name' => 'Nordic Fashion Group',
                'industry' => 'Retail & E-commerce',
                'duration' => '3.5 Months',
                'tagline' => 'High-concurrency digital store handling 50,000+ SKUs, flash sales, and automated courier fulfillment.',
                'overview' => 'Nordic Fashion Group needed a modern commerce engine capable of handling high-volume weekend flash sales without slowing down, combined with a wholesale B2B pricing portal.',
                'problem' => 'Their previous legacy platform crashed repeatedly during seasonal discount events and could not support tiered wholesale volume pricing.',
                'solution' => 'Engineered a blazingly fast store using Laravel, Redis multi-tier caching, and Alpine.js, integrated with automated courier parcel dispatch and multi-currency Stripe checkout.',
                'key_features' => [
                    'Sub-150ms product catalog search using Elasticsearch and Redis',
                    'Tiered wholesale pricing rules based on customer membership tiers',
                    'Automated stock reservations during active checkout sessions',
                    'Integrated multi-courier shipping label generator and SMS updates',
                ],
                'tech_stack' => ['Laravel', 'MySQL', 'Redis', 'Alpine.js', 'Tailwind CSS', 'Stripe API'],
                'results' => [
                    '3.4x increase in mobile checkout conversion rate',
                    'Handled 25,000 concurrent shoppers during Black Friday with 0 downtime',
                    'Sub-200ms average server response time',
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=800&auto=format&fit=crop&q=80',
                'hero_image' => 'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=1600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1472851294608-062f824d29cc?w=800&auto=format&fit=crop&q=80',
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=800&auto=format&fit=crop&q=80',
                ],
                'live_url' => 'https://omnistore.demo.zarosoft.com',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'project_category_id' => $catMobile->id,
                'title' => 'PayPulse — Next-Gen FinTech Mobile Wallet & P2P Transfers',
                'slug' => 'paypulse-mobile-fintech-wallet',
                'client_name' => 'PayPulse Financial Technologies',
                'industry' => 'Banking & FinTech',
                'duration' => '5 Months',
                'tagline' => 'Instant biometric peer-to-peer transfers, utility bill automation, and zero-compromise security.',
                'overview' => 'PayPulse is a next-generation mobile financial application designed for young professionals and digital businesses to transfer funds, pay utility bills, and track spending effortlessly.',
                'problem' => 'Competitor banking apps were slow, clunky, and lacked intelligent automated expense categorization.',
                'solution' => 'ZaroSoft engineered a Flutter mobile app backed by high-security Laravel REST APIs with biometric authentication, dynamic QR payments, and instant WebSockets balance updates.',
                'key_features' => [
                    'Instant peer-to-peer payments via phone number or dynamic QR code',
                    'Biometric FaceID / Fingerprint security with encrypted payload keys',
                    'Automated utility bill reminders and one-tap payments',
                    'Visual budget analytics with automated category classification',
                ],
                'tech_stack' => ['Flutter', 'Dart', 'Laravel API', 'MySQL', 'Redis', 'WebSockets', 'Firebase'],
                'results' => [
                    '4.9 Star average rating on Apple App Store and Google Play',
                    'Over $15M in secure transaction volume processed in the first 6 months',
                    '0 security incidents or unauthorized access breaches',
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=800&auto=format&fit=crop&q=80',
                'hero_image' => 'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=1600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1563986768609-322da13575f3?w=800&auto=format&fit=crop&q=80',
                ],
                'live_url' => 'https://paypulse.demo.zarosoft.com',
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'project_category_id' => $catERP->id,
                'title' => 'MedCare Plus — Centralized Hospital & Clinic Management',
                'slug' => 'medcare-plus-healthcare-system',
                'client_name' => 'MedCare Hospital Network',
                'industry' => 'Healthcare & Clinical Services',
                'duration' => '4.5 Months',
                'tagline' => 'Unified Electronic Health Records (EHR), automated doctor appointment triage, and digital pharmacy POS.',
                'overview' => 'A multispecialty clinic network with 4 branches required a single integrated system to manage patient visits, electronic prescriptions, pharmacy inventory, and lab diagnostic test reporting.',
                'problem' => 'Patients suffered long queues, doctor schedules were frequently double-booked, and patient medical histories were fragmented across paper files.',
                'solution' => 'Built a secure HIPAA-compliant clinical web application with instant online appointment booking, digital prescription pad, and barcode-tracked pathology reporting.',
                'key_features' => [
                    'Electronic Health Record (EHR) timeline with doctor notes and history',
                    'Automated SMS/Email appointment confirmation and reminder alerts',
                    'Integrated Pathology Lab module with auto-generated PDF reports',
                    'Pharmacy point-of-sale with batch expiry alerts and inventory sync',
                ],
                'tech_stack' => ['Laravel 12', 'MySQL', 'Vue.js', 'Tailwind CSS', 'Twilio SMS API'],
                'results' => [
                    '60% reduction in patient waiting room times',
                    '12,000+ monthly digital appointments handled without double-booking',
                    '99% doctor satisfaction rating on digital prescription UX',
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80',
                'hero_image' => 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=1600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&auto=format&fit=crop&q=80',
                ],
                'live_url' => 'https://medcare.demo.zarosoft.com',
                'is_featured' => false,
                'order' => 5,
            ],
            [
                'project_category_id' => $catDesign->id,
                'title' => 'Apex Studio — Full Visual Identity & Interactive Design System',
                'slug' => 'apex-studio-brand-identity-design',
                'client_name' => 'Apex Creative Studio Ltd',
                'industry' => 'Creative & Media Enterprise',
                'duration' => '1.5 Months',
                'tagline' => 'Complete brand identity book, custom geometric logo mark, 3D motion assets, and design system.',
                'overview' => 'Apex Studio sought a premium, high-tech visual rebranding to transition from a local boutique to an international creative powerhouse.',
                'problem' => 'Their outdated branding lacked sophistication and failed to resonate with enterprise technology clients.',
                'solution' => 'Created a comprehensive visual identity system including a mathematical geometric logo mark, custom typography hierarchy, 3D brand motion graphics, and a complete UI design system in Figma.',
                'key_features' => [
                    'Golden-ratio geometric logo mark and responsive sub-brand logos',
                    '50-page Brand Guidelines Book detailing typography, colors, and spatial grid',
                    'Turnkey corporate stationery (Business cards, invoices, presentation decks)',
                    'Figma component library with 200+ auto-layout UI tokens',
                ],
                'tech_stack' => ['Figma', 'Adobe Illustrator', 'After Effects', 'Blender 3D'],
                'results' => [
                    '140% surge in inbound enterprise lead conversion rate',
                    'Winner of regional Brand Identity of the Year honors',
                    '100% brand consistency maintained across 6 regional marketing teams',
                ],
                'thumbnail' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=800&auto=format&fit=crop&q=80',
                'hero_image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=1600&auto=format&fit=crop&q=80',
                'gallery' => [
                    'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=800&auto=format&fit=crop&q=80',
                ],
                'live_url' => 'https://apexstudio.demo.zarosoft.com',
                'is_featured' => false,
                'order' => 6,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }

        // 8. Blog Categories & Tags
        $bCatSoftware = BlogCategory::updateOrCreate(['slug' => 'software-architecture'], ['name' => 'Software & Architecture']);
        $bCatAI = BlogCategory::updateOrCreate(['slug' => 'ai-automation'], ['name' => 'AI & Automation']);
        $bCatLaravel = BlogCategory::updateOrCreate(['slug' => 'laravel-php'], ['name' => 'Laravel & PHP']);
        $bCatERP = BlogCategory::updateOrCreate(['slug' => 'erp-solutions'], ['name' => 'ERP & Business Systems']);
        $bCatUIUX = BlogCategory::updateOrCreate(['slug' => 'ui-ux-design'], ['name' => 'UI/UX & Product Design']);
        $bCatCloud = BlogCategory::updateOrCreate(['slug' => 'cloud-devops'], ['name' => 'Cloud & DevOps']);

        $tagLaravel = Tag::updateOrCreate(['slug' => 'laravel'], ['name' => 'Laravel']);
        $tagMySQL = Tag::updateOrCreate(['slug' => 'mysql'], ['name' => 'MySQL']);
        $tagAI = Tag::updateOrCreate(['slug' => 'ai'], ['name' => 'AI']);
        $tagERP = Tag::updateOrCreate(['slug' => 'erp'], ['name' => 'ERP']);
        $tagArchitecture = Tag::updateOrCreate(['slug' => 'architecture'], ['name' => 'Architecture']);
        $tagDesign = Tag::updateOrCreate(['slug' => 'uiux'], ['name' => 'UI/UX']);

        // 9. Blogs
        $blogs = [
            [
                'blog_category_id' => $bCatERP->id,
                'title' => 'Building Scalable Custom ERP Systems with Laravel 12 and MySQL: A Comprehensive Guide',
                'slug' => 'building-scalable-erp-with-laravel-mysql',
                'excerpt' => 'Discover how to architect high-concurrency ERP solutions that handle millions of financial ledger transactions while keeping response times under 200ms.',
                'content' => '## The Modern Enterprise Needs Custom Architecture

Off-the-shelf ERP platforms often lock growing enterprises into rigid workflows and exorbitant recurring per-seat fees. When your business processes are proprietary, trying to bend an off-the-shelf software to match your operational reality creates friction.

### Core Database Principles for High-Concurrency ERPs

1. **Strict Double-Entry Ledger Architecture**: Never update account balances with direct write operations without an immutable ledger journal entry.
2. **Compound Indexing on Multi-Tenant Tables**: High-volume queries filtering by `tenant_id`, `created_at`, and `status` require composite indexes.
3. **Database Transactions (`DB::transaction`)**: Every inventory stock transfer or invoice posting must be executed atomically to eliminate data corruption.

```php
DB::transaction(function () use ($order) {
    $order->update([\'status\' => \'completed\']);
    $this->inventoryService->deductStock($order->items);
    $this->ledgerService->recordIncomeJournal($order);
});
```

### Why Laravel 12 is the Premier ERP Backend

Laravel provides unmatched developer velocity combined with enterprise-grade tooling: robust queue workers, scheduled tasks, database migrations with zero downtime, and a powerful Eloquent ORM that seamlessly interfaces with MySQL.',
                'cover_image' => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=1200&auto=format&fit=crop&q=80',
                'author_name' => 'Tanvir Ahmed',
                'author_avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&auto=format&fit=crop&q=80',
                'read_time' => '7 min read',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(2),
                'views_count' => 1420,
            ],
            [
                'blog_category_id' => $bCatAI->id,
                'title' => 'How Practical AI and OCR Automation are Supercharging Business Operations in 2026',
                'slug' => 'practical-ai-ocr-business-automation-2026',
                'excerpt' => 'Cut through the AI hype. Here is how modern businesses are saving hundreds of work-hours each week using tailored document OCR and intelligent RAG chatbots.',
                'content' => "## Moving Beyond Hype to Measurable ROI\n\nWhile general conversational chatbots dominate the headlines, the real commercial value of AI lies in automating tedious, repetitive operational workflows.\n\n### 1. Automated Invoice & Receipt OCR Extraction\n\nInstead of data entry operators manually keying in vendor invoices, modern computer vision models extract key-value pairs (Invoice #, Date, Line Items, Tax, Total) directly into your ERP in seconds.\n\n### 2. Context-Aware Support Chatbots\n\nBy grounding Large Language Models with Retrieval-Augmented Generation (RAG) on your internal product documentation and FAQ database, support bots can resolve up to 80% of customer inquiries accurately without human intervention.\n\n### The ZaroSoft Approach\n\nWe integrate AI directly where your data lives — seamlessly connected to your Laravel backend and MySQL database, ensuring total data privacy and zero data leakage.",
                'cover_image' => 'https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?w=1200&auto=format&fit=crop&q=80',
                'author_name' => 'Rakibul Hasan',
                'author_avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&auto=format&fit=crop&q=80',
                'read_time' => '5 min read',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(5),
                'views_count' => 980,
            ],
            [
                'blog_category_id' => $bCatSoftware->id,
                'title' => 'The ZARO Philosophy: Why Zenith, Automation, Reliability & Optimization Drive Our Code',
                'slug' => 'the-zaro-philosophy-brand-story',
                'excerpt' => 'ZaroSoft was founded on four unwavering pillars. Here is what Zenith, Automation, Reliability, and Optimization mean for every line of code we write.',
                'content' => "## Beyond Writing Code: Engineering Solutions\n\nWhen we founded ZaroSoft, we recognized that businesses do not just want software; they want outcomes. They want fewer manual errors, faster execution, predictable systems, and scalable growth.\n\n### The Four ZARO Pillars:\n\n- **Z — Zenith (Aiming for Highest Quality)**: We never settle for mediocre implementations. From pixel-perfect layouts to pristine backend architectures, we aim for the apex of craftsmanship.\n- **A — Automation**: If a task is performed more than twice, it should be automated. We eliminate human bottlenecks through intelligent workflows.\n- **R — Reliability (Reliable Technology)**: Business systems cannot fail. We engineer resilient, fault-tolerant applications with automated backups, rigorous testing, and 99.9% uptime.\n- **O — Optimization**: We optimize for speed, user clarity, server efficiency, and highest return on investment.\n\n> *\"ZaroSoft isn't just about writing code. We build technology that solves real business problems.\"*",
                'cover_image' => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&auto=format&fit=crop&q=80',
                'author_name' => 'Mohammad Zaid',
                'author_avatar' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=200&auto=format&fit=crop&q=80',
                'read_time' => '4 min read',
                'is_featured' => true,
                'is_published' => true,
                'published_at' => now()->subDays(8),
                'views_count' => 2100,
            ],
            [
                'blog_category_id' => $bCatUIUX->id,
                'title' => 'Designing Enterprise Dashboards Users Actually Love: UI/UX Principles for High Productivity',
                'slug' => 'designing-enterprise-dashboards-users-love',
                'excerpt' => 'Complex business software does not have to be ugly and confusing. Learn how to design high-density data dashboards with clarity, speed, and modern aesthetics.',
                'content' => "## The Problem with Traditional Enterprise Software\n\nTraditional enterprise software is notoriously cluttered, slow, and unintuitive. Workers spend hours hunting for buttons hidden under sub-menus.\n\n### Key Principles for Modern Enterprise UI/UX:\n\n1. **Progressive Disclosure**: Show users the primary information first, and provide contextual drill-downs on demand.\n2. **Visual Hierarchy & Information Density**: Use clean typography hierarchies and whitespace to make dense data tables scannable.\n3. **Dark / Light Mode Flexibility**: Provide eye-friendly dark modes for power users who spend 8+ hours inside the system daily.\n4. **Keyboard-First Shortcuts**: Allow operators to navigate, search, and submit forms without touching the mouse.",
                'cover_image' => 'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?w=1200&auto=format&fit=crop&q=80',
                'author_name' => 'Sabbir Hossain',
                'author_avatar' => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=200&auto=format&fit=crop&q=80',
                'read_time' => '6 min read',
                'is_featured' => false,
                'is_published' => true,
                'published_at' => now()->subDays(12),
                'views_count' => 750,
            ],
        ];

        foreach ($blogs as $blogData) {
            $blog = Blog::updateOrCreate(['slug' => $blogData['slug']], $blogData);
            $blog->tags()->sync([$tagLaravel->id, $tagMySQL->id, $tagERP->id]);
        }

        // 10. Testimonials
        $testimonials = [
            [
                'client_name' => 'Engr. Rafiqul Islam',
                'client_position' => 'Managing Director',
                'company' => 'Apex Industrial Mills Ltd.',
                'location' => 'Dhaka, Bangladesh',
                'avatar' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&auto=format&fit=crop&q=80',
                'rating' => 5,
                'quote' => 'ZaroSoft transformed our factory operations completely. Their custom ERP replaced 15 disjointed spreadsheets and gave us real-time visibility across all 3 production facilities. Outstanding technical team with true business understanding.',
                'project_title' => 'Custom Manufacturing ERP Suite',
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'client_name' => 'Dr. Farhana Yasmin',
                'client_position' => 'Chief Operations Officer',
                'company' => 'MedCare Hospital Network',
                'location' => 'Chittagong, Bangladesh',
                'avatar' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=200&auto=format&fit=crop&q=80',
                'rating' => 5,
                'quote' => 'The patient management and digital pharmacy system engineered by ZaroSoft cut our patient wait times by more than half. Their ongoing support and responsiveness are simply world-class.',
                'project_title' => 'Clinical Healthcare Platform',
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'client_name' => 'David Lindqvist',
                'client_position' => 'Head of Digital Commerce',
                'company' => 'Nordic Fashion Group',
                'location' => 'Stockholm, Sweden',
                'avatar' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=200&auto=format&fit=crop&q=80',
                'rating' => 5,
                'quote' => 'Our previous website collapsed during flash sales. ZaroSoft re-architected our e-commerce platform with Laravel and Redis; it handled over 25,000 concurrent shoppers without breaking a sweat. Highest recommendation!',
                'project_title' => 'High-Concurrency E-Commerce Store',
                'is_featured' => true,
                'order' => 3,
            ],
            [
                'client_name' => 'Shahidul Alam',
                'client_position' => 'Chief Technology Officer',
                'company' => 'FinGlobal Logistics',
                'location' => 'Dubai, UAE',
                'avatar' => 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=200&auto=format&fit=crop&q=80',
                'rating' => 5,
                'quote' => 'Their AI OCR integration automated 95% of our manual invoice entry. The return on investment was achieved within the first 60 days of deployment. ZaroSoft is our go-to engineering partner.',
                'project_title' => 'AI Document OCR & Bot Integration',
                'is_featured' => true,
                'order' => 4,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(['client_name' => $testimonial['client_name']], $testimonial);
        }

        // 11. FAQs
        $faqs = [
            [
                'category' => 'General',
                'question' => 'What makes ZaroSoft different from other software agencies?',
                'answer' => 'ZaroSoft is rooted in the ZARO philosophy: Zenith (aiming for technical excellence), Automation (removing manual human bottlenecks), Reliability (building bulletproof fault-tolerant software), and Optimization (delivering high ROI). We do not just write code; we design custom technology systems that solve real business problems.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'category' => 'Development',
                'question' => 'How much does custom software or ERP development cost?',
                'answer' => 'Custom software development cost depends on project scope, complexity, modules required, and third-party integrations. We provide transparent milestones with fixed-price or dedicated monthly engineering models. Contact us with your project details for an accurate quote.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'category' => 'Development',
                'question' => 'How long does a typical software development project take?',
                'answer' => 'A custom web application or MVP typically takes 4 to 8 weeks, while comprehensive enterprise ERP platforms or multi-tenant SaaS products range between 8 to 16 weeks, delivered through agile bi-weekly demonstration sprints.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'category' => 'ERP & Business',
                'question' => 'Can ZaroSoft build a custom ERP tailored to our factory or business workflow?',
                'answer' => 'Yes, custom ERP engineering is one of our core strengths. We specialize in manufacturing, inventory, procurement, accounts, and HR modules tailored around your exact operations rather than forcing you to adapt to rigid generic software.',
                'order' => 4,
                'is_active' => true,
            ],
            [
                'category' => 'AI & Cloud',
                'question' => 'Can you integrate AI and OCR automation into our existing software?',
                'answer' => 'Absolutely. We integrate custom AI capabilities such as invoice OCR document extraction, intelligent customer support chatbots, and predictive sales analytics into existing legacy systems and custom backends via secure RESTful APIs.',
                'order' => 5,
                'is_active' => true,
            ],
            [
                'category' => 'Support',
                'question' => 'Do you provide long-term maintenance and technical support after launch?',
                'answer' => 'Yes. Every project includes complimentary post-launch warranty support, and we offer comprehensive monthly SLA maintenance packages including 24/7 uptime monitoring, security patching, and ongoing feature updates.',
                'order' => 6,
                'is_active' => true,
            ],
            [
                'category' => 'General',
                'question' => 'Do you work with international clients across different time zones?',
                'answer' => 'Yes, we work with clients across North America, Europe, the Middle East, and Asia. Our team maintains flexible communication windows and provides transparent asynchronous project tracking via Slack, GitHub, and video calls.',
                'order' => 7,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::updateOrCreate(['question' => $faq['question']], $faq);
        }

        // 12. Sample Contact Requests (Mini CRM test leads)
        $sampleLeads = [
            [
                'ticket_number' => 'ZS-LEAD-1001',
                'name' => 'Anisur Rahman',
                'email' => 'anisur@textilebd.com',
                'phone' => '+880 1819-123456',
                'company' => 'Apex Textiles Ltd.',
                'service_interest' => 'ERP Development',
                'budget_range' => '$5,000 - $10,000',
                'message' => 'We need a custom manufacturing ERP for our garment manufacturing facility with fabric inventory, cutting order sheets, and worker production tracking.',
                'status' => 'discussion',
                'admin_notes' => 'Had initial discovery call on Zoom. Sent technical questionnaire. Awaiting BOM sample formats.',
                'created_at' => now()->subDays(3),
            ],
            [
                'ticket_number' => 'ZS-LEAD-1002',
                'name' => 'Sophia Martinez',
                'email' => 'sophia@cloudcare.io',
                'phone' => '+1 415-555-8921',
                'company' => 'CloudCare SaaS',
                'service_interest' => 'SaaS Development',
                'budget_range' => '$10,000+',
                'message' => 'Looking to build a multi-tenant healthcare scheduling SaaS with automated Stripe billing and SMS patient alerts.',
                'status' => 'proposal',
                'admin_notes' => 'Sent formal technical proposal and sprint breakdown ($14,500). Decision expected by Thursday.',
                'created_at' => now()->subDays(1),
            ],
            [
                'ticket_number' => 'ZS-LEAD-1003',
                'name' => 'Kamrul Hassan',
                'email' => 'kamrul@retailhub.com',
                'phone' => '+880 1711-987654',
                'company' => 'RetailHub Bangladesh',
                'service_interest' => 'E-commerce Development',
                'budget_range' => '$2,500 - $5,000',
                'message' => 'Need a high-speed multi-vendor e-commerce platform with automated bKash/Nagad and Pathao courier API integration.',
                'status' => 'new',
                'admin_notes' => null,
                'created_at' => now()->subHours(4),
            ],
        ];

        foreach ($sampleLeads as $lead) {
            ContactRequest::updateOrCreate(['ticket_number' => $lead['ticket_number']], $lead);
        }
    }
}

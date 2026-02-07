<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class HomepageContentSeeder extends Seeder
{
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();

        $tables = [
            'navbar_links',
            'navbar_settings',
            'bottom_nav_links',
            'hero_sections',
            'about_highlights',
            'about_sections',
            'services',
            'services_sections',
            'stats',
            'stats_sections',
            'portfolio_items',
            'portfolio_sections',
            'industries',
            'industries_sections',
            'client_logos',
            'clients_sections',
            'contact_details',
            'contact_sections',
            'footer_social_links',
            'footer_quick_links',
            'footer_more_links',
            'footer_service_items',
            'footer_settings',
        ];

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        $now = now();

        $navbarId = DB::table('navbar_settings')->insertGetId([
            'logo_url' => 'https://stagepass.nuhiluxurytravel.com/uploads/StagePass-LOGO-y.png',
            'cta_label' => 'Get AV Quote',
            'cta_href' => null,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $navbarLinks = [
            ['label' => 'Home', 'href' => '#home'],
            ['label' => 'About Us', 'href' => '#about'],
            ['label' => 'Services', 'href' => '#services'],
            ['label' => 'Our Work', 'href' => '#portfolio'],
            ['label' => 'Industries', 'href' => '#industries'],
            ['label' => 'Contact Us', 'href' => '#contact'],
        ];

        foreach ($navbarLinks as $index => $link) {
            DB::table('navbar_links')->insert([
                'navbar_settings_id' => $navbarId,
                'label' => $link['label'],
                'href' => $link['href'],
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $bottomLinks = [
            ['label' => 'Home', 'href' => '#home', 'icon' => 'Home'],
            ['label' => 'About', 'href' => '#about', 'icon' => 'Info'],
            ['label' => 'Services', 'href' => '#services', 'icon' => 'Briefcase'],
            ['label' => 'Work', 'href' => '#portfolio', 'icon' => 'Camera'],
            ['label' => 'Contact', 'href' => '#contact', 'icon' => 'Mail'],
        ];

        foreach ($bottomLinks as $index => $link) {
            DB::table('bottom_nav_links')->insert([
                'label' => $link['label'],
                'href' => $link['href'],
                'icon' => $link['icon'],
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        DB::table('hero_sections')->insert([
            'headline' => 'We Create the Most Engaging Events in the World Using Technology',
            'background_video_url' => 'https://stagepass.co.ke/uploads/video/ceo.mp4',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $aboutId = DB::table('about_sections')->insertGetId([
            'badge_label' => 'About Us',
            'title' => 'Who We Are',
            'description_primary' => 'StagePass Audio-Visual Limited is an integrated technical, consulting, planning, design and implementation provider for professional events based in Nairobi and operating within Africa. <br><br> We specialize in rentals of Audio-Visual technology including Sound, Screens, Lighting, Content Management, Digital and Interactive technology and scenic design.',
            'description_secondary' => '',
            'image_url' => 'https://stagepass.co.ke/uploads/banners/visionsp.jpg',
            'stat_value' => '2362+',
            'stat_label' => 'Successful Events',
            'button_label' => 'Learn More About Us',
            'vision_title' => 'Our Vision',
            'vision_text' => "TO BE AFRICA'S REVOLUTIONARY EVENTS TECHNOLOGY EXPERTS",
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $highlights = [
            'Integrated technical consulting',
            'Professional event planning & design',
            'Complete implementation support',
            'Africa-wide operations',
        ];

        foreach ($highlights as $index => $text) {
            DB::table('about_highlights')->insert([
                'about_section_id' => $aboutId,
                'text' => $text,
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $servicesSectionId = DB::table('services_sections')->insertGetId([
            'badge_label' => 'Our Capabilities',
            'title' => 'One-Stop-Solution For All Your AV Services',
            'description' => 'From concept to set-up to on-site support, we are there every step of the way to provide you with the exceptional product and service you deserve.',
            'people_title' => 'Our People',
            'people_description' => "While we've got the most trusted audiovisual, staging and lighting brands available to you, it is our unparalleled team that will exceed your expectations.",
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $services = [
            [
                'title' => 'Full Production & Event Packages',
                'description' => 'Complete event production services from start to finish, handling all technical needs.',
                'icon' => 'Box',
                'gradient' => 'from-yellow-400 to-yellow-600',
            ],
            [
                'title' => 'Visual',
                'description' => 'Stunning visual displays with cutting-edge screen technology and sharp imagery.',
                'icon' => 'Monitor',
                'gradient' => 'from-[#172455] to-[#1e3a8a]',
            ],
            [
                'title' => 'Staging Services',
                'description' => 'Safe and creative staging solutions for any event requirement.',
                'icon' => 'Radio',
                'gradient' => 'from-yellow-400 to-yellow-600',
            ],
            [
                'title' => 'Lighting',
                'description' => 'Intelligent lighting design that creates emotion through color, texture and movement.',
                'icon' => 'Lightbulb',
                'gradient' => 'from-[#172455] to-[#1e3a8a]',
            ],
            [
                'title' => 'Rigging & Truss Services',
                'description' => 'Professional rigging and truss services with legal and technical compliance.',
                'icon' => 'Grid3x3',
                'gradient' => 'from-yellow-400 to-yellow-600',
            ],
            [
                'title' => 'Graphics',
                'description' => 'Eye-catching visual content including signs, posters, and printed materials.',
                'icon' => 'Palette',
                'gradient' => 'from-[#172455] to-[#1e3a8a]',
            ],
            [
                'title' => 'Audio',
                'description' => 'Crystal clear sound systems with complex control and diverse inputs.',
                'icon' => 'Volume2',
                'gradient' => 'from-yellow-400 to-yellow-600',
            ],
            [
                'title' => 'Design Services',
                'description' => 'Flawless design planning for lighting, staging, audio and overall event aesthetics.',
                'icon' => 'PenTool',
                'gradient' => 'from-[#172455] to-[#1e3a8a]',
            ],
            [
                'title' => 'Equipment Rentals & Sales',
                'description' => 'Massive inventory of the best audiovisual technology available for rent or purchase.',
                'icon' => 'Package',
                'gradient' => 'from-yellow-400 to-yellow-600',
            ],
        ];

        foreach ($services as $index => $service) {
            DB::table('services')->insert([
                'services_section_id' => $servicesSectionId,
                'title' => $service['title'],
                'description' => $service['description'],
                'icon' => $service['icon'],
                'gradient' => $service['gradient'],
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $statsSectionId = DB::table('stats_sections')->insertGetId([
            'headline' => 'Sound reinforcement for 70,000 pax during',
            'subheadline' => 'EVERTON VS KARIOBANGI SHARKS Football Match',
            'background_video_url' => 'https://api.stagepass.co.ke/uploads/video/sharks.mp4',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $stats = [
            ['value' => '43,234', 'label' => 'AV Equipment', 'icon' => 'Package'],
            ['value' => '421', 'label' => 'Happy Clients', 'icon' => 'Users'],
            ['value' => '2,362', 'label' => 'Events', 'icon' => 'Calendar'],
        ];

        foreach ($stats as $index => $stat) {
            DB::table('stats')->insert([
                'stats_section_id' => $statsSectionId,
                'value' => $stat['value'],
                'label' => $stat['label'],
                'icon' => $stat['icon'],
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $portfolioSectionId = DB::table('portfolio_sections')->insertGetId([
            'badge_label' => 'Our Work',
            'title' => 'Portfolio Gallery',
            'description' => 'Explore our recent projects and see how we bring events to life with cutting-edge technology and creative excellence.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $portfolioItems = [
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/1.jpg', 'title' => 'Corporate Event 2024'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/2.jpg', 'title' => 'Concert Production'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/3.jpg', 'title' => 'Festival Setup'],
            ['type' => 'video', 'thumbnail' => 'uploads/portfolio/4.jpg', 'title' => 'Stage Lighting Design', 'youtube_id' => 'sJSNvegZDoI'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/5.jpg', 'title' => 'Audio Visual Setup'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/6.jpg', 'title' => 'Conference Production'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/7.jpg', 'title' => 'Exhibition Event'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/8.jpg', 'title' => 'Gala Dinner Setup'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/9.jpg', 'title' => 'New Portfolio Item 1'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/10.jpg', 'title' => 'New Portfolio Item 2'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/11.jpg', 'title' => 'New Portfolio Item 3'],
            ['type' => 'image', 'thumbnail' => 'uploads/portfolio/12.jpg', 'title' => 'New Portfolio Item 4'],
        ];

        foreach ($portfolioItems as $index => $item) {
            DB::table('portfolio_items')->insert([
                'portfolio_section_id' => $portfolioSectionId,
                'type' => $item['type'],
                'thumbnail' => $item['thumbnail'],
                'title' => $item['title'],
                'youtube_id' => $item['youtube_id'] ?? null,
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $industriesSectionId = DB::table('industries_sections')->insertGetId([
            'title' => 'Industries We Serve',
            'subtitle' => 'StagePass Audio Visual serves a diverse range of industries with tailored solutions.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $industries = [
            [
                'title' => 'Corporate & Business Events',
                'description' => 'Professional audio-visual solutions for corporate gatherings, conferences, and business events.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>Conferences & summits</li><li>Product launches</li><li>AGMs & shareholder meetings</li><li>Award ceremonies</li><li>Team-building events</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Sound systems, LED screens, stage lighting, live streaming, interpretation systems</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Entertainment & Live Shows',
                'description' => 'Immersive audio-visual experiences for concerts, festivals, and live performances.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>Concerts & music festivals</li><li>Comedy shows</li><li>Theatre productions</li><li>Cultural performances</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Line array sound systems, moving lights, LED backdrops, special effects, stage design</p></div>',
                'icon_name' => 'Music',
            ],
            [
                'title' => 'Exhibitions & Trade Shows',
                'description' => 'Engaging displays and interactive solutions for exhibitions and trade shows.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>Exhibition stands</li><li>Product demo booths</li><li>Brand activations</li><li>Expo pavilions</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Touch screens, video walls, digital signage, interactive displays, booth lighting</p></div>',
                'icon_name' => 'Clapperboard',
            ],
            [
                'title' => 'Education & Training',
                'description' => 'Comprehensive AV solutions for educational institutions and training centers.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>University lecture halls</li><li>Training centers</li><li>E-learning environments</li><li>Graduation ceremonies</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Projectors, smart boards, recording systems, lecture capture, hybrid learning setups</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Religious Institutions',
                'description' => 'Professional AV systems for worship services, conferences, and religious events.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>Weekly worship services</li><li>Conferences & crusades</li><li>Religious festivals</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Installed sound systems, IMAG screens, stage lighting, live broadcast systems</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Hospitality & Tourism',
                'description' => 'Elegant AV solutions for hotels, resorts, and destination events.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>Hotel conferences</li><li>Destination weddings</li><li>Gala dinners</li><li>Resort entertainment</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Ballroom AV, ambient lighting, outdoor sound systems, projection mapping</p></div>',
                'icon_name' => 'Gem',
            ],
            [
                'title' => 'Healthcare & Medical',
                'description' => 'Specialized AV solutions for medical conferences and healthcare facilities.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>Medical conferences</li><li>Hospital auditoriums</li><li>Surgical training broadcasts</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Presentation systems, live surgery streaming, recording systems, interpretation systems</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Government & Public Sector',
                'description' => 'Large-scale AV solutions for government functions and public events.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>National celebrations</li><li>Policy summits</li><li>State functions</li><li>Public forums</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Large-scale sound systems, LED screens, live broadcasting, security-compliant AV solutions</p></div>',
                'icon_name' => 'Building2',
            ],
            [
                'title' => 'Retail & Brand Experiences',
                'description' => 'Dynamic displays and interactive experiences for retail and brand activations.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>Store launches</li><li>Mall activations</li><li>Pop-up brand experiences</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Digital signage, LED displays, interactive screens, ambient lighting</p></div>',
                'icon_name' => 'Palette',
            ],
            [
                'title' => 'Media, Film & Broadcasting',
                'description' => 'Professional studio and broadcast solutions for media production.',
                'overlay_description' => '<div class="text-left"><p class="font-semibold text-yellow-400 mb-3">Services include:</p><ul class="list-disc list-inside mb-4 space-y-1 text-sm"><li>TV studios</li><li>Podcast studios</li><li>Film premieres</li><li>Live broadcasts</li></ul><p class="font-semibold text-yellow-400 mb-2">AV Needs:</p><p class="text-sm">Studio lighting, broadcast cameras, control rooms, virtual sets, streaming systems</p></div>',
                'icon_name' => 'Clapperboard',
            ],
        ];

        foreach ($industries as $index => $industry) {
            DB::table('industries')->insert([
                'industries_section_id' => $industriesSectionId,
                'title' => $industry['title'],
                'description' => $industry['description'],
                'overlay_description' => $industry['overlay_description'] ?? null,
                'icon_name' => $industry['icon_name'] ?? null,
                'icon_url' => $industry['icon_url'] ?? null,
                'image_url' => $industry['image_url'] ?? null,
                'video_url' => $industry['video_url'] ?? null,
                'link_url' => $industry['link_url'] ?? null,
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $clientsSectionId = DB::table('clients_sections')->insertGetId([
            'badge_label' => 'The Power Behind Us',
            'title' => 'Our Clients',
            'description' => 'With forward-thinking brands and organizations that demand reliability, creativity, and flawless execution. From corporate leaders to global innovators, our clients trust us to elevate their events.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $clientLogos = [
            'WEB-LOGOS-01.jpg', 'WEB-LOGOS-02.jpg', 'WEB-LOGOS-03.jpg', 'WEB-LOGOS-04.jpg',
            'WEB-LOGOS-05.jpg', 'WEB-LOGOS-06.jpg', 'WEB-LOGOS-07.jpg', 'WEB-LOGOS-08.jpg',
            'WEB-LOGOS-09.jpg', 'WEB-LOGOS-10.jpg', 'WEB-LOGOS-11.jpg', 'WEB-LOGOS-12.jpg',
            'WEB-LOGOS-13.jpg', 'WEB-LOGOS-14.jpg', 'WEB-LOGOS-15.jpg', 'WEB-LOGOS-16.jpg',
            'WEB-LOGOS-17.jpg', 'WEB-LOGOS-18.jpg', 'WEB-LOGOS-19.jpg', 'WEB-LOGOS-20.jpg',
        ];

        foreach ($clientLogos as $index => $file) {
            DB::table('client_logos')->insert([
                'clients_section_id' => $clientsSectionId,
                'logo_path' => "uploads/clients/{$file}",
                'alt_text' => 'Client ' . ($index + 1),
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $contactSectionId = DB::table('contact_sections')->insertGetId([
            'badge_label' => 'Get In Touch',
            'title' => "Let's Create Something Amazing Together",
            'subtitle' => null,
            'description' => 'Ready to elevate your next event? Contact us today for a quote or consultation.',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $contactDetails = [
            ['label' => 'Location', 'value' => "Paa ya Paa Lane, Off Ridgeways Road\nNairobi, Kenya", 'icon' => 'MapPin'],
            ['label' => 'Phone', 'value' => '+254 729 171 351', 'icon' => 'Phone'],
            ['label' => 'Email', 'value' => 'info@stagepass.co.ke', 'icon' => 'Mail'],
            ['label' => 'Business Hours', 'value' => "Mon - Fri: 9:00 AM - 6:00 PM\nSat: 10:00 AM - 4:00 PM", 'icon' => 'Clock'],
        ];

        foreach ($contactDetails as $index => $detail) {
            DB::table('contact_details')->insert([
                'contact_section_id' => $contactSectionId,
                'label' => $detail['label'],
                'value' => $detail['value'],
                'icon' => $detail['icon'],
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $footerId = DB::table('footer_settings')->insertGetId([
            'logo_url' => 'https://stagepass.nuhiluxurytravel.com/uploads/StagePass-LOGO-y.png',
            'description' => "Africa's premier audio-visual and event technology provider, delivering excellence through innovation and expertise.",
            'copyright' => '© 2025 StagePass Audio Visual Limited. All rights reserved. | Creative Solutions | Technical Excellence',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        $footerSocialLinks = [
            ['platform' => 'Facebook', 'url' => '#'],
            ['platform' => 'Twitter', 'url' => '#'],
            ['platform' => 'Instagram', 'url' => '#'],
            ['platform' => 'Linkedin', 'url' => '#'],
            ['platform' => 'Youtube', 'url' => '#'],
        ];

        foreach ($footerSocialLinks as $index => $social) {
            DB::table('footer_social_links')->insert([
                'footer_settings_id' => $footerId,
                'platform' => $social['platform'],
                'url' => $social['url'],
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $footerQuickLinks = [
            ['label' => 'About Us', 'href' => '/about'],
            ['label' => 'Services', 'href' => '/services'],
            ['label' => 'Our Work', 'href' => '/our-work'],
            ['label' => 'Industries', 'href' => '/industries'],
            ['label' => 'Contact', 'href' => '/contact'],
        ];

        foreach ($footerQuickLinks as $index => $link) {
            DB::table('footer_quick_links')->insert([
                'footer_settings_id' => $footerId,
                'label' => $link['label'],
                'href' => $link['href'],
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $footerMoreLinks = [
            ['label' => 'Terms & Conditions', 'href' => '/terms-and-conditions'],
            ['label' => 'Privacy Policy', 'href' => '/privacy'],
            ['label' => 'Sitemap', 'href' => '/sitemap'],
            ['label' => 'Get AV Quote', 'href' => '#quote'],
        ];

        foreach ($footerMoreLinks as $index => $link) {
            DB::table('footer_more_links')->insert([
                'footer_settings_id' => $footerId,
                'label' => $link['label'],
                'href' => $link['href'],
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        $footerServices = [
            'Full Production',
            'Visual & Screens',
            'Staging Services',
            'Lighting Design',
            'Audio Systems',
            'Equipment Rentals',
        ];

        foreach ($footerServices as $index => $label) {
            DB::table('footer_service_items')->insert([
                'footer_settings_id' => $footerId,
                'label' => $label,
                'sort_order' => $index + 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        Schema::enableForeignKeyConstraints();
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        $now = now();

        // About Page
        DB::table('about_pages')->updateOrInsert(
            ['id' => 1],
            [
                'title' => 'About Us - StagePass Audio Visual | Professional AV Solutions in Kenya',
                'meta_description' => 'Learn about StagePass Audio Visual, Kenya\'s leading provider of professional audio-visual solutions, event production services, and technical excellence since our founding.',
                'meta_keywords' => 'about stagepass, audio visual company kenya, av solutions nairobi, event production kenya, professional av services, stagepass team, av technology kenya, sound systems kenya, lighting solutions nairobi',
                'og_image' => '/uploads/og-about.jpg',
                'hero_title' => 'About StagePass Audio Visual',
                'hero_subtitle' => 'Delivering exceptional audio-visual experiences with cutting-edge technology and unmatched expertise across Kenya and East Africa.',
                'content' => '<p>StagePass Audio Visual is a premier provider of professional audio-visual solutions, serving clients across Kenya and East Africa. With years of experience in event production, corporate presentations, and technical installations, we bring creativity and technical excellence to every project.</p><p>Our team of skilled professionals is dedicated to delivering exceptional results that exceed expectations. From intimate corporate gatherings to large-scale events, we have the expertise and equipment to make your vision a reality.</p>',
                'image_url' => '/uploads/about-image.jpg',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        // Services Page
        DB::table('services_pages')->updateOrInsert(
            ['id' => 1],
            [
                'title' => 'Our Services - Professional AV Solutions | StagePass Audio Visual',
                'meta_description' => 'Comprehensive audio-visual services including sound systems, lighting, video production, event staging, and technical support for corporate events, conferences, and live productions in Kenya.',
                'meta_keywords' => 'av services kenya, sound systems nairobi, event lighting kenya, video production services, corporate av solutions, live event production, stage setup kenya, audio visual rental, av equipment kenya, event technology services',
                'og_image' => '/uploads/og-services.jpg',
                'hero_title' => 'Our Professional AV Services',
                'hero_subtitle' => 'Comprehensive audio-visual solutions tailored to your event needs, from corporate presentations to large-scale productions.',
                'content' => '<p>StagePass offers a complete range of audio-visual services designed to elevate your events. Our services include professional sound systems, state-of-the-art lighting solutions, high-definition video production, and comprehensive event staging.</p><p>Whether you\'re hosting a corporate conference, product launch, concert, or private event, we provide the technology and expertise to ensure flawless execution.</p>',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        // Our Work Page
        DB::table('our_work_pages')->updateOrInsert(
            ['id' => 1],
            [
                'title' => 'Our Work - Portfolio | StagePass Audio Visual Projects',
                'meta_description' => 'Explore StagePass Audio Visual\'s portfolio of successful events, corporate productions, and technical installations across Kenya. See our work in action.',
                'meta_keywords' => 'stagepass portfolio, av projects kenya, event case studies, corporate events nairobi, successful av installations, event production examples, stagepass work, av projects showcase, event photography kenya',
                'og_image' => '/uploads/og-portfolio.jpg',
                'hero_title' => 'Our Work & Portfolio',
                'hero_subtitle' => 'Showcasing our successful projects and the exceptional audio-visual experiences we\'ve created for clients across various industries.',
                'content' => '<p>Our portfolio represents a diverse range of successful projects, from intimate corporate gatherings to large-scale public events. Each project showcases our commitment to excellence and attention to detail.</p><p>Browse through our gallery to see how we\'ve helped clients achieve their vision through innovative audio-visual solutions and professional event production.</p>',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        // Industries Page
        DB::table('industries_pages')->updateOrInsert(
            ['id' => 1],
            [
                'title' => 'Industries We Serve - AV Solutions for Every Sector | StagePass',
                'meta_description' => 'StagePass provides specialized audio-visual solutions for corporate, entertainment, education, healthcare, hospitality, and government sectors across Kenya.',
                'meta_keywords' => 'corporate av solutions, entertainment industry kenya, education technology, healthcare av systems, hospitality av services, government events kenya, sector-specific av solutions, industry av services nairobi',
                'og_image' => '/uploads/og-industries.jpg',
                'hero_title' => 'Industries We Serve',
                'hero_subtitle' => 'Specialized audio-visual solutions tailored to the unique needs of different industries and sectors.',
                'content' => '<p>StagePass serves a diverse range of industries, each with unique audio-visual requirements. From corporate boardrooms to entertainment venues, educational institutions to healthcare facilities, we understand the specific needs of each sector.</p><p>Our industry expertise allows us to deliver solutions that not only meet technical requirements but also align with industry standards and best practices.</p>',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        // Contact Page
        DB::table('contact_pages')->updateOrInsert(
            ['id' => 1],
            [
                'title' => 'Contact Us - Get in Touch | StagePass Audio Visual Kenya',
                'meta_description' => 'Contact StagePass Audio Visual for professional AV solutions in Kenya. Reach us via phone, email, or visit our Nairobi office. Get a free quote for your next event.',
                'meta_keywords' => 'contact stagepass, av company nairobi, stagepass contact, av services kenya contact, event production quote, av consultation kenya, stagepass phone number, av company email, nairobi av services',
                'og_image' => '/uploads/og-contact.jpg',
                'hero_title' => 'Get in Touch',
                'hero_subtitle' => 'Ready to bring your event to life? Contact our team for professional audio-visual solutions and expert consultation.',
                'content' => '<p>We\'d love to hear from you! Whether you\'re planning an event, need technical consultation, or have questions about our services, our team is here to help.</p><p>Reach out to us through any of the contact methods below, and we\'ll get back to you promptly.</p>',
                'form_title' => 'Send Us a Message',
                'form_description' => 'Fill out the form below and we\'ll respond within 24 hours. For urgent inquiries, please call us directly.',
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        // Terms and Conditions Page
        DB::table('terms_pages')->updateOrInsert(
            ['id' => 1],
            [
                'title' => 'Terms and Conditions - StagePass Audio Visual',
                'meta_description' => 'Read StagePass Audio Visual\'s terms and conditions for service agreements, equipment rental, event production services, and client responsibilities.',
                'meta_keywords' => 'stagepass terms, av service terms, equipment rental terms, event production agreement, service conditions, av company terms kenya, client agreement, terms of service',
                'og_image' => '/uploads/og-terms.jpg',
                'hero_title' => 'Terms and Conditions',
                'hero_subtitle' => 'Please read our terms and conditions carefully before using our services or equipment.',
                'content' => '<h2>1. Service Agreement</h2><p>By engaging StagePass Audio Visual services, you agree to these terms and conditions. All services are subject to availability and confirmation.</p><h2>2. Payment Terms</h2><p>Payment terms will be specified in your service agreement. A deposit may be required to secure your booking.</p><h2>3. Equipment Rental</h2><p>All equipment remains the property of StagePass Audio Visual. Clients are responsible for any damage or loss during the rental period.</p><h2>4. Cancellation Policy</h2><p>Cancellation terms will be outlined in your specific service agreement. Please refer to your contract for details.</p><h2>5. Liability</h2><p>StagePass Audio Visual carries appropriate insurance coverage. Our liability is limited as specified in your service agreement.</p>',
                'last_updated' => now()->toDateString(),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );

        // Privacy Policy Page
        DB::table('privacy_pages')->updateOrInsert(
            ['id' => 1],
            [
                'title' => 'Privacy Policy - StagePass Audio Visual Data Protection',
                'meta_description' => 'StagePass Audio Visual privacy policy outlining how we collect, use, and protect your personal information in compliance with data protection regulations.',
                'meta_keywords' => 'stagepass privacy policy, data protection kenya, personal information protection, privacy statement, data security, gdpr compliance, client data privacy, information security',
                'og_image' => '/uploads/og-privacy.jpg',
                'hero_title' => 'Privacy Policy',
                'hero_subtitle' => 'Your privacy is important to us. Learn how we collect, use, and protect your personal information.',
                'content' => '<h2>1. Information We Collect</h2><p>We collect information that you provide directly to us, including name, contact details, and event requirements when you request our services.</p><h2>2. How We Use Your Information</h2><p>We use your information to provide services, communicate with you, process payments, and improve our services. We do not sell your personal information to third parties.</p><h2>3. Data Security</h2><p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p><h2>4. Your Rights</h2><p>You have the right to access, update, or delete your personal information. Contact us to exercise these rights.</p><h2>5. Cookies and Tracking</h2><p>Our website may use cookies to enhance user experience. You can control cookie settings through your browser preferences.</p><h2>6. Changes to This Policy</h2><p>We may update this privacy policy from time to time. We will notify you of any significant changes.</p>',
                'last_updated' => now()->toDateString(),
                'created_at' => $now,
                'updated_at' => $now,
            ]
        );
    }
}

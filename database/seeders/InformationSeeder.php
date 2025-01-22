<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Information::create([
            'logo' => 'images/logo.png',
            'facebook_link' => 'https://www.facebook.com/profile.php?id=61571122659949&mibextid=wwXIfr',
            'instagram_link' => 'https://www.instagram.com/inspro_production?igsh=MWd6Zm44Mmt5NGduMw%3D%3D&utm_source=qr',
            'tiktok_link' => 'https://tiktok.com/@example',
            'youtube_link' => 'https://youtube.com/@insproproduction?si=_p9E41A-WcLMoo2U',
            'linkedin_link' => 'https://www.linkedin.com/in/inspro-production-5ab457342?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=ios_app',
            'threads_link' => 'https://www.threads.net/@inspro_production?igshid=NTc4MTIwNjQ2YQ==',
            'details' => 'Inspro Production is a company specializing in providing creative and comprehensive solutions in photography, advertising, and marketing, as well as managing social media pages. We are dedicated to delivering professional services that help our clients enhance their brand identity through innovative visual content and effective marketing campaigns.With our talented team and extensive market expertise, we are committed to meeting our clients aspirations and achieving their goals in a distinctive and impactful way. Whether you need professional photography, striking advertisement design, or improved digital presence on social media platforms, Inspro Production offers integrated solutions to meet all your marketing needs.',
            'address_1' => 'Near knisit mar charbel adonis',
            'address_2' => ' batron villa',
            'map_link' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d733.3611904852047!2d35.610212822935736!3d33.96564890847933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151f3f196d6a4db3%3A0xce56cd2bec61934c!2sGeorge%205%20Theatre!5e0!3m2!1sar!2seg!4v1736488262254!5m2!1sar!2seg',
            'email'=>'insproproduction@gmail.com',
            'whatsapp_number'=>'96176373271',
            'phone_number'=>'+961 76373271',
            'small_details'=>'Inspro Production specializes in innovative photography, advertising, and social media solutions. We craft creative content and impactful campaigns to enhance brand identity and achieve client goals.',
            'videos_nb'=>'30',
            'photos_nb'=>'200',
            'contents_nb'=>'50',
            'website_nb'=>'9',
            'work_link'=>'https://forms.gle/wQEkQ4id2k4hTAV79',

        ]);
    }
    
}

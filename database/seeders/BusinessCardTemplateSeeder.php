<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusinessCardTemplate;
use App\Models\BusinessCardElement;

class BusinessCardTemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create sample templates
        $templates = [
            [
                'name' => 'Corporate Classic',
                'description' => 'Professional and clean design perfect for corporate environments',
                'category' => 'corporate',
                'preview_image' => 'admin/assets/images/business_cards/templates/previews/corporate-classic-preview.jpg',
                'background_color' => '#ffffff',
                'template_data' => [
                    'background_color' => '#ffffff',
                    'text_color' => '#333333',
                    'accent_color' => '#2563eb'
                ],
                'available_colors' => ['#ffffff', '#f8fafc', '#1e293b', '#2563eb'],
                'available_fonts' => ['Arial', 'Helvetica', 'Times New Roman', 'Georgia'],
                'is_premium' => false,
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Modern Minimalist',
                'description' => 'Clean and modern design with plenty of white space',
                'category' => 'minimal',
                'preview_image' => 'admin/assets/images/business_cards/templates/previews/modern-minimalist-preview.jpg',
                'background_color' => '#ffffff',
                'template_data' => [
                    'background_color' => '#ffffff',
                    'text_color' => '#1f2937',
                    'accent_color' => '#10b981'
                ],
                'available_colors' => ['#ffffff', '#f9fafb', '#1f2937', '#10b981'],
                'available_fonts' => ['Roboto', 'Open Sans', 'Lato', 'Arial'],
                'is_premium' => false,
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Creative Bold',
                'description' => 'Eye-catching design with bold colors and creative layout',
                'category' => 'creative',
                'preview_image' => 'admin/assets/images/business_cards/templates/previews/creative-bold-preview.jpg',
                'background_color' => '#7c3aed',
                'template_data' => [
                    'background_color' => '#7c3aed',
                    'text_color' => '#ffffff',
                    'accent_color' => '#fbbf24'
                ],
                'available_colors' => ['#7c3aed', '#ec4899', '#f59e0b', '#10b981'],
                'available_fonts' => ['Montserrat', 'Poppins', 'Roboto', 'Open Sans'],
                'is_premium' => true,
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Elegant Gold',
                'description' => 'Sophisticated design with gold accents and elegant typography',
                'category' => 'elegant',
                'preview_image' => 'admin/assets/images/business_cards/templates/previews/elegant-gold-preview.jpg',
                'background_color' => '#1f2937',
                'template_data' => [
                    'background_color' => '#1f2937',
                    'text_color' => '#ffffff',
                    'accent_color' => '#fbbf24'
                ],
                'available_colors' => ['#1f2937', '#374151', '#fbbf24', '#f59e0b'],
                'available_fonts' => ['Playfair Display', 'Georgia', 'Times New Roman', 'Merriweather'],
                'is_premium' => true,
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'Tech Modern',
                'description' => 'Sleek design perfect for tech companies and startups',
                'category' => 'modern',
                'preview_image' => 'admin/assets/images/business_cards/templates/previews/tech-modern-preview.jpg',
                'background_color' => '#0f172a',
                'template_data' => [
                    'background_color' => '#0f172a',
                    'text_color' => '#ffffff',
                    'accent_color' => '#06b6d4'
                ],
                'available_colors' => ['#0f172a', '#1e293b', '#06b6d4', '#3b82f6'],
                'available_fonts' => ['Inter', 'Roboto', 'Open Sans', 'Lato'],
                'is_premium' => false,
                'is_active' => true,
                'sort_order' => 5
            ],
            [
                'name' => 'Healthcare Professional',
                'description' => 'Clean and trustworthy design for healthcare professionals',
                'category' => 'corporate',
                'preview_image' => 'admin/assets/images/business_cards/templates/previews/healthcare-professional-preview.jpg',
                'background_color' => '#ffffff',
                'template_data' => [
                    'background_color' => '#ffffff',
                    'text_color' => '#1e40af',
                    'accent_color' => '#059669'
                ],
                'available_colors' => ['#ffffff', '#f0f9ff', '#1e40af', '#059669'],
                'available_fonts' => ['Arial', 'Helvetica', 'Roboto', 'Open Sans'],
                'is_premium' => false,
                'is_active' => true,
                'sort_order' => 6
            ]
        ];

        foreach ($templates as $templateData) {
            $template = BusinessCardTemplate::create($templateData);
            
            // Create elements for each template
            $this->createTemplateElements($template);
        }
    }

    private function createTemplateElements($template)
    {
        $elements = [
            [
                'element_type' => 'text',
                'element_name' => 'name',
                'position' => ['x' => 50, 'y' => 30],
                'size' => ['width' => 200, 'height' => 30],
                'style' => [
                    'fontSize' => 18,
                    'fontFamily' => 'Arial',
                    'color' => '#333333',
                    'fontWeight' => 'bold',
                    'alignment' => 'left'
                ],
                'default_text' => 'Your Name',
                'is_editable' => true,
                'is_required' => true,
                'z_index' => 10
            ],
            [
                'element_type' => 'text',
                'element_name' => 'job_title',
                'position' => ['x' => 50, 'y' => 60],
                'size' => ['width' => 200, 'height' => 25],
                'style' => [
                    'fontSize' => 14,
                    'fontFamily' => 'Arial',
                    'color' => '#666666',
                    'fontWeight' => 'normal',
                    'alignment' => 'left'
                ],
                'default_text' => 'Job Title',
                'is_editable' => true,
                'is_required' => false,
                'z_index' => 9
            ],
            [
                'element_type' => 'text',
                'element_name' => 'company',
                'position' => ['x' => 50, 'y' => 90],
                'size' => ['width' => 200, 'height' => 25],
                'style' => [
                    'fontSize' => 16,
                    'fontFamily' => 'Arial',
                    'color' => '#333333',
                    'fontWeight' => 'bold',
                    'alignment' => 'left'
                ],
                'default_text' => 'Company Name',
                'is_editable' => true,
                'is_required' => false,
                'z_index' => 8
            ],
            [
                'element_type' => 'text',
                'element_name' => 'phone',
                'position' => ['x' => 50, 'y' => 120],
                'size' => ['width' => 200, 'height' => 20],
                'style' => [
                    'fontSize' => 12,
                    'fontFamily' => 'Arial',
                    'color' => '#666666',
                    'fontWeight' => 'normal',
                    'alignment' => 'left'
                ],
                'default_text' => 'Phone Number',
                'is_editable' => true,
                'is_required' => false,
                'z_index' => 7
            ],
            [
                'element_type' => 'text',
                'element_name' => 'email',
                'position' => ['x' => 50, 'y' => 140],
                'size' => ['width' => 200, 'height' => 20],
                'style' => [
                    'fontSize' => 12,
                    'fontFamily' => 'Arial',
                    'color' => '#666666',
                    'fontWeight' => 'normal',
                    'alignment' => 'left'
                ],
                'default_text' => 'Email Address',
                'is_editable' => true,
                'is_required' => false,
                'z_index' => 6
            ],
            [
                'element_type' => 'text',
                'element_name' => 'website',
                'position' => ['x' => 50, 'y' => 160],
                'size' => ['width' => 200, 'height' => 20],
                'style' => [
                    'fontSize' => 12,
                    'fontFamily' => 'Arial',
                    'color' => '#666666',
                    'fontWeight' => 'normal',
                    'alignment' => 'left'
                ],
                'default_text' => 'Website',
                'is_editable' => true,
                'is_required' => false,
                'z_index' => 5
            ],
            [
                'element_type' => 'image',
                'element_name' => 'logo',
                'position' => ['x' => 250, 'y' => 30],
                'size' => ['width' => 80, 'height' => 80],
                'style' => [
                    'borderRadius' => 0,
                    'opacity' => 1
                ],
                'default_text' => null,
                'is_editable' => true,
                'is_required' => false,
                'z_index' => 15
            ]
        ];

        foreach ($elements as $elementData) {
            $elementData['template_id'] = $template->id;
            BusinessCardElement::create($elementData);
        }
    }
}
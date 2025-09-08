<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SocialLinks extends Component
{
    public array $links;

    /**
     * Create a new component instance.
     *
     * @param array $links
     */
    public function __construct(array $links = [])
    {
        // Default social links
        $this->links = $links ?: [
            [
                'name' => 'Facebook',
                'url' => '#',
                'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 1 0-11 9.95v-7.05H8v-3h3V9.5c0-3 1.79-4.67 4.52-4.67 1.31 0 2.68.23 2.68.23v3h-1.5c-1.49 0-1.95.92-1.95 1.87v2.24h3.33l-.53 3h-2.8v7.05A10 10 0 0 0 22 12"/></svg>'
            ],
            [
                'name' => 'Twitter',
                'url' => '#',
                'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53A4.48 4.48 0 0 0 22.4 1s-4.12 2.47-6.18 4.43A4.48 4.48 0 0 0 11.07 4v.06A12.66 12.66 0 0 1 3 2s-4 9 5 13a13.1 13.1 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>'
            ],
            [
                'name' => 'Instagram',
                'url' => '#',
                'icon' => '<svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.2c3.2 0 3.6 0 4.9.07 1.2.06 2 .25 2.5.42a5 5 0 0 1 1.8 1.04c.5.48.88 1.08 1.04 1.8.17.5.36 1.3.42 2.5.07 1.3.07 1.7.07 4.9s0 3.6-.07 4.9c-.06 1.2-.25 2-.42 2.5a5.02 5.02 0 0 1-1.04 1.8 5 5 0 0 1-1.8 1.04c-.5.17-1.3.36-2.5.42-1.3.07-1.7.07-4.9.07s-3.6 0-4.9-.07c-1.2-.06-2-.25-2.5-.42a5 5 0 0 1-1.8-1.04 5 5 0 0 1-1.04-1.8c-.17-.5-.36-1.3-.42-2.5C2.2 15.6 2.2 15.2 2.2 12s0-3.6.07-4.9c.06-1.2.25-2 .42-2.5a5 5 0 0 1 1.04-1.8 5 5 0 0 1 1.8-1.04c.5-.17 1.3-.36 2.5-.42C8.4 2.2 8.8 2.2 12 2.2m0-2.2C8.7 0 8.3 0 7 0 5.7 0 4.7.2 3.9.5a7.2 7.2 0 0 0-2.6 1.6A7.2 7.2 0 0 0 .5 4.9C.2 5.7 0 6.7 0 8c0 1.3 0 1.7 0 4s0 2.7.07 4c.06 1.2.25 2 .42 2.5a7.2 7.2 0 0 0 1.6 2.6 7.2 7.2 0 0 0 2.6 1.6c.5.17 1.3.36 2.5.42 1.3.07 1.7.07 4 .07s2.7 0 4-.07c1.2-.06 2-.25 2.5-.42a7.2 7.2 0 0 0 2.6-1.6 7.2 7.2 0 0 0 1.6-2.6c.17-.5.36-1.3.42-2.5.07-1.3.07-1.7.07-4s0-2.7-.07-4c-.06-1.2-.25-2-.42-2.5a7.2 7.2 0 0 0-1.6-2.6 7.2 7.2 0 0 0-2.6-1.6C16.7.2 15.7 0 14.4 0c-1.3 0-1.7 0-4 0z"/></svg>'
            ],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render()
    {
        return view('components.social-links');
    }
}

import tailwindcss from "@tailwindcss/vite";

// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
    compatibilityDate: '2025-07-15',
    devtools: { enabled: true },
    css: ['~/assets/css/main.css'],
    modules: [
        '@nuxt/fonts',
        '@nuxt/icon',
        '@nuxt/image',
        '@nuxtjs/i18n'
    ],
    runtimeConfig: {
        public: {
            apiBase: "https://10-mio-ch-crowdfunding.ddev.site/api"
        }
    },
    fonts: {
        defaults: {
            weights: [400, 700, 900],
            styles: ['normal', 'italic'],
            subsets: ['latin', 'latin-ext'],
        },
        provider: 'bunny',
        families: [
            { name: "Inter" },
        ]
    },
    i18n: {
        locales: [
            { code: 'de', language: "de-CH", file: 'de.json' },
            { code: 'fr', language: "fr-FR", file: 'fr.json' }
        ],
        compilation: {
            strictMessage: false,
            escapeHtml: false,
        },
    },
    vite: {
        plugins: [tailwindcss()],
    }
})

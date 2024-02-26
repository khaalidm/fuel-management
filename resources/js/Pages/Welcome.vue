<script setup>
import { Head, Link } from '@inertiajs/vue3';

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
    laravelVersion: {
        type: String,
        required: true,
    },
    phpVersion: {
        type: String,
        required: true,
    },
});
</script>

<template>
    <Head title="Welcome" />

    <div
        class="relative sm:flex sm:justify-center sm:items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white"
    >
        <div v-if="canLogin" class="sm:fixed sm:top-0 sm:right-0 p-6 text-end">
            <Link
                v-if="$page.props.auth.user"
                :href="route('dashboard')"
                class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                >Dashboard</Link
            >

            <template v-else>
                <Link
                    :href="route('login')"
                    class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Log in</Link
                >

                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="ms-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500"
                    >Register</Link
                >
            </template>
        </div>

        <div class="max-w-7xl mx-auto p-6 lg:p-8">
            <div class="flex justify-center">
                <svg
                    xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
                    xmlns="http://www.w3.org/2000/svg"
                    xmlns:cc="http://creativecommons.org/ns#"
                    xmlns:dc="http://purl.org/dc/elements/1.1/"
                    xmlns:svg="http://www.w3.org/2000/svg"
                    xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape"
                    xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd"
                    xmlns:ns1="http://sozi.baierouge.fr"
                    xmlns:xlink="http://www.w3.org/1999/xlink"
                    version="1.0"
                    viewBox="0 0 64 64"
                >
                    <rect
                        y="54"
                        width="30"
                        x="26"
                        height="10"
                    />
                    <rect
                        rx="4"
                        ry="3"
                        height="61"
                        width="38"
                        y="0"
                        x="22"
                    />
                    <rect
                        style="fill:#FFF"
                        rx="3"
                        ry="2"
                        height="20"
                        width="26"
                        y="6"
                        x="28"
                    />
                    <path
                        style="stroke:#000;stroke-width:3;fill:none"
                        d="m23 7c-1.5798 0.76729-5 4.4974-5 8.6735v40.2c0 10.778-23.846 9.5753-9.4358-12.438 3.5246-5.3842 6.8372-12.451 9.4358-23.563"
                    />
                    <path
                        d="m18 14 5-8v15h-5z"
                    />
                    <metadata
                    >
                        <rdf:RDF
                        >
                            <cc:Work
                            >
                                <dc:format
                                >image/svg+xml</dc:format
                                >
                                <dc:type
                                    rdf:resource="http://purl.org/dc/dcmitype/StillImage"
                                />
                                <cc:license
                                    rdf:resource="http://creativecommons.org/licenses/publicdomain/"
                                />
                                <dc:publisher
                                >
                                    <cc:Agent
                                        rdf:about="http://openclipart.org/"
                                    >
                                        <dc:title
                                        >Openclipart</dc:title
                                        >
                                    </cc:Agent
                                    >
                                </dc:publisher
                                >
                                <dc:title
                                >pictogram petrol pump</dc:title
                                >
                                <dc:date
                                >2011-02-26T22:48:37</dc:date
                                >
                                <dc:description
                                >A pictogram of a petrol pump like those found on road signs</dc:description
                                >
                                <dc:source
                                >https://openclipart.org/detail/123067/pictogram-petrol-pump-by-pawnk</dc:source
                                >
                                <dc:creator
                                >
                                    <cc:Agent
                                    >
                                        <dc:title
                                        >pawnk</dc:title
                                        >
                                    </cc:Agent
                                    >
                                </dc:creator
                                >
                                <dc:subject
                                >
                                    <rdf:Bag
                                    >
                                        <rdf:li
                                        >gas</rdf:li
                                        >
                                        <rdf:li
                                        >petrol</rdf:li
                                        >
                                        <rdf:li
                                        >pictogram</rdf:li
                                        >
                                        <rdf:li
                                        >pump</rdf:li
                                        >
                                    </rdf:Bag
                                    >
                                </dc:subject
                                >
                            </cc:Work
                            >
                            <cc:License
                                rdf:about="http://creativecommons.org/licenses/publicdomain/"
                            >
                                <cc:permits
                                    rdf:resource="http://creativecommons.org/ns#Reproduction"
                                />
                                <cc:permits
                                    rdf:resource="http://creativecommons.org/ns#Distribution"
                                />
                                <cc:permits
                                    rdf:resource="http://creativecommons.org/ns#DerivativeWorks"
                                />
                            </cc:License
                            >
                        </rdf:RDF
                        >
                    </metadata
                    >
                </svg>
            </div>

            <div class="mt-16">

            </div>

            <div class="flex justify-center mt-16 px-6 sm:items-center sm:justify-between">
                <div class="text-center text-sm sm:text-start">&nbsp;</div>

                <div class="text-center text-sm text-gray-500 dark:text-gray-400 sm:text-end sm:ms-0">
                    Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
                </div>
            </div>
        </div>
    </div>
</template>

<style>
.bg-dots-darker {
    background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(0,0,0,0.07)'/%3E%3C/svg%3E");
}
@media (prefers-color-scheme: dark) {
    .dark\:bg-dots-lighter {
        background-image: url("data:image/svg+xml,%3Csvg width='30' height='30' viewBox='0 0 30 30' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1.22676 0C1.91374 0 2.45351 0.539773 2.45351 1.22676C2.45351 1.91374 1.91374 2.45351 1.22676 2.45351C0.539773 2.45351 0 1.91374 0 1.22676C0 0.539773 0.539773 0 1.22676 0Z' fill='rgba(255,255,255,0.07)'/%3E%3C/svg%3E");
    }
}
</style>

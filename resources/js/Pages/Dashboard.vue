<script setup>
import { ref} from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head } from '@inertiajs/vue3';

const props = defineProps(['wordsets', 'today'])
const collections = ref(props.wordsets)
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Today is {{ today }}</h2>
        </template>

        <div class="pt-6 pb-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <div class="flex flex-col gap-y-4">
                        <div :class="collections['16days'] ? collections['16days'].repeat_16days ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 16 days</div>
                                <template v-if="collections['16days']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['16days'].repeat_16days" type="checkbox" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['16days'].repeat_16days">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex gap-x-4">
                                <template v-if="collections['16days']">
                                    <div class="font-semibold">Collection «{{ collections['16days'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['16days'].id_puzzle_english" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['16days'].id_puzzle_english }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['7days'] ? collections['7days'].repeat_7days ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 7 days</div>
                                <template v-if="collections['7days']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['7days'].repeat_7days" type="checkbox" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['7days'].repeat_7days">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex gap-x-4">
                                <template v-if="collections['7days']">
                                    <div class="font-semibold">Collection «{{ collections['7days'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['7days'].id_puzzle_english" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['7days'].id_puzzle_english }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['3days'] ? collections['3days'].repeat_3days ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 3 days</div>
                                <template v-if="collections['3days']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['3days'].repeat_3days" type="checkbox" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['3days'].repeat_3days">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex gap-x-4">
                                <template v-if="collections['3days']">
                                    <div class="font-semibold">Collection «{{ collections['3days'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['3days'].id_puzzle_english" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + wordsets['3days'].id_puzzle_english }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['1day'] ? collections['1day'].repeat_1day ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="bg-blue-200 rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 1 day</div>
                                <template v-if="collections['1day']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['1day'].repeat_1day" type="checkbox" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['1day'].repeat_1day">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex gap-x-4">
                                <template v-if="collections['1day']">
                                    <div class="font-semibold">Collection «{{ collections['1day'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['1day'].id_puzzle_english" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['1day'].id_puzzle_english }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['today'] ? collections['today'].learnt_at ? 'bg-gray-100' : 'bg-lime-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Learn today</div>
                                <template v-if="collections['today']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['today'].learnt_at" type="checkbox" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-lime-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-lime-500"></div>
                                    </label>
                                    <div v-if="collections['today'].learnt_at">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex gap-x-4">
                                <template v-if="collections['today']">
                                    <div class="font-semibold">Collection «{{ collections['today'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english + '&view=cards'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english + '&view=cards' }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['today'] && collections['today'].learnt_at ? collections['today'].repeat_1hour ? 'bg-gray-100' : 'bg-emerald-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 1 hour</div>
                                <template v-if="collections['today'] && collections['today'].learnt_at">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['today'].repeat_1hour" type="checkbox" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                    </label>
                                    <div v-if="collections['today'].repeat_1hour">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex gap-x-4">
                                <template v-if="collections['today']">
                                    <div class="font-semibold">Collection «{{ collections['today'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['today'] && collections['today'].repeat_1hour && collections['today'].learnt_at ? collections['today'].repeat_8hours ? 'bg-gray-100' : 'bg-emerald-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 8 hours</div>
                                <template v-if="collections['today'] && collections['today'].repeat_1hour && collections['today'].learnt_at">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['today'].repeat_8hours" type="checkbox" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                    </label>
                                    <div v-if="collections['today'].repeat_8hours">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex gap-x-4">
                                <template v-if="collections['today']">
                                    <div class="font-semibold">Collection «{{ collections['today'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>

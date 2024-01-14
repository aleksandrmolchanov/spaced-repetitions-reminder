<script setup>
import { reactive, watch } from 'vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, router } from '@inertiajs/vue3';

const props = defineProps(['wordsets', 'today'])
const collections = reactive(props.wordsets)

if(collections['90days']) {
    watch(
        () => collections['90days'].repeat_90days,
        (value) => {
            router.patch(route('wordset', {id: collections['90days'].id}), {
                step: '90days',
                value
            }, {
                preserveState: true,
                preserveScroll: true
            })
        }
    )
}

if(collections['30days']) {
    watch(
        () => collections['30days'].repeat_16days,
        (value) => {
            router.patch(route('wordset', {id: collections['30days'].id}), {
                step: '30days',
                value
            }, {
                preserveState: true,
                preserveScroll: true
            })
        }
    )
}

if(collections['16days']) {
    watch(
        () => collections['16days'].repeat_16days,
        (value) => {
            router.patch(route('wordset', {id: collections['16days'].id}), {
                step: '16days',
                value
            }, {
                preserveState: true,
                preserveScroll: true
            })
        }
    )
}

if(collections['7days']) {
    watch(
        () => collections['7days'].repeat_7days,
        (value) => {
            router.patch(route('wordset', {id: collections['7days'].id}), {
                step: '7days',
                value
            }, {
                preserveState: true,
                preserveScroll: true
            })
        }
    )
}

if(collections['3days']) {
    watch(
        () => collections['3days'].repeat_3days,
        (value) => {
            router.patch(route('wordset', {id: collections['3days'].id}), {
                step: '3days',
                value
            }, {
                preserveState: true,
                preserveScroll: true
            })
        }
    )
}

if(collections['1day']) {
    watch(
        () => collections['1day'].repeat_1day,
        (value) => {
            router.patch(route('wordset', {id: collections['1day'].id}), {
                step: '1day',
                value
            }, {
                preserveState: true,
                preserveScroll: true
            })
        }
    )
}

if(collections['today']) {
    watch(
        () => collections['today'].learnt_at,
        (value) => {
            router.patch(route('wordset', {id: collections['today'].id}), {
                step: 'learnt',
                value: Number(value)
            }, {
                preserveState: true,
                preserveScroll: true
            })
            if(value === 0){
                collections['today'].repeat_1hour = false
                collections['today'].repeat_8hours = false
            }
        }
    )
}

if(collections['today']) {
    watch(
        () => collections['today'].repeat_1hour,
        (value) => {
            router.patch(route('wordset', {id: collections['today'].id}), {
                step: 'repeat_1hour',
                value
            }, {
                preserveState: true,
                preserveScroll: true
            })
            if(value === false){
                collections['today'].repeat_8hours = false
            }
        }
    )
}

if(collections['today']) {
    watch(
        () => collections['today'].repeat_8hours,
        (value) => {
            router.patch(route('wordset', {id: collections['today'].id}), {
                step: 'repeat_8hours',
                value
            }, {
                preserveState: true,
                preserveScroll: true
            })
        }
    )
}

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
                        <div :class="collections['90days'] ? collections['90days'].repeat_90days ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 90 days</div>
                                <template v-if="collections['90days']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['90days'].repeat_90days" type="checkbox" :true-value="1" :false-value="0" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['90days'].repeat_90days">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
                                <template v-if="collections['90days']">
                                    <div class="font-semibold">Collection «{{ collections['90days'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['90days'].id_puzzle_english + '&shuffle'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['90days'].id_puzzle_english + '&shuffle' }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['30days'] ? collections['30days'].repeat_30days ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 30 days</div>
                                <template v-if="collections['30days']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['30days'].repeat_30days" type="checkbox" :true-value="1" :false-value="0" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['30days'].repeat_30days">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
                                <template v-if="collections['30days']">
                                    <div class="font-semibold">Collection «{{ collections['30days'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['30days'].id_puzzle_english + '&shuffle'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['30days'].id_puzzle_english + '&shuffle' }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['16days'] ? collections['16days'].repeat_16days ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 16 days</div>
                                <template v-if="collections['16days']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['16days'].repeat_16days" type="checkbox" :true-value="1" :false-value="0" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['16days'].repeat_16days">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
                                <template v-if="collections['16days']">
                                    <div class="font-semibold">Collection «{{ collections['16days'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['16days'].id_puzzle_english + '&shuffle'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['16days'].id_puzzle_english + '&shuffle' }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['7days'] ? collections['7days'].repeat_7days ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 7 days</div>
                                <template v-if="collections['7days']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['7days'].repeat_7days" type="checkbox" :true-value="1" :false-value="0" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['7days'].repeat_7days">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
                                <template v-if="collections['7days']">
                                    <div class="font-semibold">Collection «{{ collections['7days'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['7days'].id_puzzle_english + '&shuffle'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['7days'].id_puzzle_english + '&shuffle' }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['3days'] ? collections['3days'].repeat_3days ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 3 days</div>
                                <template v-if="collections['3days']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['3days'].repeat_3days" type="checkbox" :true-value="1" :false-value="0" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['3days'].repeat_3days">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
                                <template v-if="collections['3days']">
                                    <div class="font-semibold">Collection «{{ collections['3days'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['3days'].id_puzzle_english + '&shuffle'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + wordsets['3days'].id_puzzle_english + '&shuffle' }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['1day'] ? collections['1day'].repeat_1day ? 'bg-gray-100' : 'bg-blue-200' : 'bg-gray-100'" class="bg-blue-200 rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 1 day</div>
                                <template v-if="collections['1day']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['1day'].repeat_1day" type="checkbox" :true-value="1" :false-value="0" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-500"></div>
                                    </label>
                                    <div v-if="collections['1day'].repeat_1day">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
                                <template v-if="collections['1day']">
                                    <div class="font-semibold">Collection «{{ collections['1day'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['1day'].id_puzzle_english + '&shuffle'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['1day'].id_puzzle_english + '&shuffle' }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['today'] ? collections['today'].learnt_at ? 'bg-gray-100' : 'bg-lime-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Learn today</div>
                                <template v-if="collections['today']">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['today'].learnt_at" type="checkbox" :true-value="collections['today'].learnt_at ?? 1" :false-value="null" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-lime-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-lime-500"></div>
                                    </label>
                                    <div v-if="collections['today'].learnt_at">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
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
                                        <input v-model="collections['today'].repeat_1hour" type="checkbox" :true-value="1" :false-value="0" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                    </label>
                                    <div v-if="collections['today'].repeat_1hour">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
                                <template v-if="collections['today']">
                                    <div class="font-semibold">Collection «{{ collections['today'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english + '&shuffle'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english + '&shuffle' }}</a>
                                </template>
                                <div v-else class="text-gray-600">Nothing</div>
                            </div>
                        </div>
                        <div :class="collections['today'] && collections['today'].repeat_1hour && collections['today'].learnt_at ? collections['today'].repeat_8hours ? 'bg-gray-100' : 'bg-emerald-200' : 'bg-gray-100'" class="rounded-lg px-4 py-3 w-full">
                            <div class="flex items-center gap-x-4">
                                <div class="">Repeat after 8 hours</div>
                                <template v-if="collections['today'] && collections['today'].repeat_1hour && collections['today'].learnt_at">
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input v-model="collections['today'].repeat_8hours" type="checkbox" :true-value="1" :false-value="0" value="" class="sr-only peer">
                                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                                    </label>
                                    <div v-if="collections['today'].repeat_8hours">Done</div>
                                </template>
                            </div>
                            <div class="mt-4 flex flex-col lg:flex-row gap-x-4 gap-y-1">
                                <template v-if="collections['today']">
                                    <div class="font-semibold">Collection «{{ collections['today'].title }}»</div>
                                    <a class="hover:underline" :href="'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english + '&shuffle'" target="_blank">{{ 'https://puzzle-english.com/change-my-dictionary?set=' + collections['today'].id_puzzle_english + '&shuffle' }}</a>
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

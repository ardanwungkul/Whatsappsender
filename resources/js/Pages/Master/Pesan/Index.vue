<script setup>
import { computed, ref } from "vue";
import { usePage, Link } from "@inertiajs/vue3";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { route } from "ziggy-js";
import ConfirmDelete from "@/Components/ConfirmDelete.vue";
import { router } from "@inertiajs/vue3";
import axios from "axios";
import SuccessMessage from "@/Components/SuccessMessage.vue";
const data = ref(usePage().props.pesan);

const setSuccess = ref([]);
const success = computed(() => setSuccess.value);
const totalData = ref(0);
const loading = ref(false);
const options = ref({ page: 1, itemsPerPage: 10 });
const headers = [
    { title: "No", value: "index" },
    { title: "Konten", value: "content" },
    { title: "Digunakan", value: "used" },
    { title: "Aksi", value: "action", align: "center" },
];

const deleteData = async (id) => {
    try {
        const response = await axios.delete(route("pesan.destroy", id));

        if (response.status === 200) {
            setSuccess.value = [response.data.message];
            data.value = data.value.filter((item) => item.id !== id);
        }
    } catch (error) {
        console.error("Gagal menghapus pesan:", error);
    }
};
</script>
<template>
    <AdminLayout title="Format Pesan">
        <SuccessMessage class="w-full" :messages="success" />
        <div
            class="bg-light-primary-1 dark:bg-dark-primary-2 p-5 rounded-lg space-y-3 shadow-lg"
        >
            <Link :href="route('pesan.create')">
                <div
                    v-bind="activatorProps"
                    class="bg-secondary-3 text-white hover:bg-opacity-90 px-4 py-2 rounded-lg gap-1 flex items-center text-sm cursor-pointer shadow-lg w-min whitespace-nowrap"
                >
                    <i class="fa-solid fa-plus"></i>
                    <p>Tambah Pesan</p>
                </div>
            </Link>
            <v-data-table
                :headers="headers"
                :items="data"
                :loading="loading"
                v-model:options="options"
                :items-per-page-options="[10, 20, 50, 100]"
                :server-items-length="totalData"
                :header-props="{
                    class: 'dark:bg-dark-primary-1 bg-light-primary-2 dark:!text-white border-b dark:!border-white/30',
                }"
                hide-default-footer
                class="border dark:!border-typography-2/20 shadow-lg dark:!bg-dark-primary-1 !bg-light-primary-2 dark:!text-typography-1"
            >
                <template #item.index="{ index }">
                    {{ (options.page - 1) * options.itemsPerPage + index + 1 }}
                </template>

                <template #no-data>
                    <p>Tidak ada data ditemukan</p>
                </template>
                <template #item.action="{ item }">
                    <div class="flex items-center justify-center gap-2">
                        <ConfirmDelete
                            label="Hapus"
                            :type="'Pesan'"
                            :id="item.id"
                            :method="deleteData"
                        ></ConfirmDelete>
                    </div>
                </template>
            </v-data-table>
            <v-pagination
                v-model="options.page"
                :length="Math.ceil(totalData / options.itemsPerPage)"
                :total-visible="5"
                class="bg-light-primary-2 border !border-typography-2/20 shadow-lg rounded-lg dark:bg-dark-primary-1 dark:text-white"
            />
        </div>
    </AdminLayout>
</template>

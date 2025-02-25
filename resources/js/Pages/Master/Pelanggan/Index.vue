<script setup>
import { onMounted, ref, watch, computed } from "vue";
import SuccessMessage from "@/Components/SuccessMessage.vue";
import AdminLayout from "@/Layouts/AdminLayout.vue";

const data = ref([]);
const totalData = ref(0);
const loading = ref(false);
const setSuccess = ref([]);
const success = computed(() => setSuccess.value);
const options = ref({ page: 1, itemsPerPage: 10 });
const headers = [
    { title: "No", value: "index" },
    { title: "Nama Pelanggan", value: "nama_pelanggan" },
    { title: "Nomor HP", value: "no_hp" },
    { title: "Aksi", value: "action" },
];

onMounted(async () => {
    getDataPelanggan();
});

const getDataPelanggan = async () => {
    loading.value = true;
    try {
        const { page, itemsPerPage } = options.value;
        const response = await axios.get(
            "https://client.webz.biz/api/pelanggan",
            {
                params: {
                    select: "id,no_hp,nama_pelanggan",
                    page,
                    per_page: itemsPerPage,
                },
            }
        );
        data.value = response.data.data;
        totalData.value = response.data.total;
    } catch (error) {
        console.error("Terjadi kesalahan:", error);
    } finally {
        loading.value = false;
    }
};
watch(options, getDataPelanggan, { deep: true });

const sendWhatsApp = async (nomor) => {
    try {
        const response = await axios.get(route("pelanggan.pesan", nomor));
        if (response.status === 200) {
            setSuccess.value = [response.data.message];
            window.open(response.data.link, "_blank");
        }
    } catch (error) {
        console.error("Gagal Mengirim Pesan:", error);
    }
};
</script>
<template>
    <AdminLayout title="Data Pelanggan">
        <SuccessMessage class="w-full" :messages="success" />
        <div
            class="bg-light-primary-1 dark:bg-dark-primary-2 p-5 rounded-lg space-y-3 shadow-lg"
        >
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
                    <button type="button" @click="sendWhatsApp(item.no_hp)">
                        <div
                            class="flex gap-2 items-center text-white bg-green-500 hover:bg-opacity-90 rounded-lg px-3 py-1 text-sm"
                        >
                            <i class="fa-brands fa-whatsapp"></i>
                            <p>Whatsapp</p>
                        </div>
                    </button>
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

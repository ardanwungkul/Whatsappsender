<script setup>
import { computed, ref } from "vue";
import axios from "axios";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { route } from "ziggy-js";
import { router } from "@inertiajs/vue3";
import SuccessMessage from "@/Components/SuccessMessage.vue";
const form = ref({
    content: null,
});
const setSuccess = ref([]);
const success = computed(() => setSuccess.value);
const errorMessage = ref("");

const submitForm = async () => {
    try {
        const response = await axios.post(route("pesan.store"), {
            content: form.value.content,
        });

        if (response.status == 201) {
            setSuccess.value = [response.data.message];
            setTimeout(() => {
                router.visit(
                    route("pesan.index", {
                        method: "get",
                    })
                );
            }, 500);
        }

        form.value.content = null;
    } catch (error) {
        if (error.response && error.response.data.errors) {
            errorMessage.value = error.response.data.errors.content[0];
        } else {
            errorMessage.value = "Terjadi kesalahan saat mengirim pesan.";
        }
    }
};
</script>

<template>
    <AdminLayout title="Format Pesan">
        <SuccessMessage class="w-full" :messages="success" />
        <div
            class="bg-light-primary-1 dark:bg-dark-primary-2 p-5 rounded-lg space-y-3 shadow-lg"
        >
            <form @submit.prevent="submitForm">
                <div>
                    <label
                        for="content"
                        class="block mb-1 text-sm dark:text-white"
                    >
                        Pesan
                    </label>
                    <input
                        type="text"
                        id="content"
                        name="content"
                        v-model="form.content"
                        class="border p-2 rounded-lg w-full text-sm"
                        placeholder="Masukkan pesan"
                    />
                    <span v-if="errorMessage" class="text-red-500">
                        {{ errorMessage }}
                    </span>
                </div>

                <button
                    type="submit"
                    class="mt-4 bg-green-500 text-white px-4 py-2 rounded-lg text-sm"
                >
                    Kirim Pesan
                </button>
            </form>
        </div>
    </AdminLayout>
</template>

<script setup>
const props = defineProps(["messages"]);

const removeMessage = (index) => {
    props.messages.splice(index, 1);
};
</script>

<template>
    <div v-if="messages">
        <div class="fixed top-3 right-3 z-[9999999]">
            <ul class="space-y-1 text-sm text-green-600">
                <li
                    v-for="(message, index) in messages"
                    :key="index"
                    class="flex items-center p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400"
                    role="alert"
                >
                    <svg
                        class="flex-shrink-0 inline w-4 h-4 me-3"
                        aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="currentColor"
                        viewBox="0 0 20 20"
                    >
                        <path
                            d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"
                        />
                    </svg>
                    <span class="sr-only">Info</span>
                    <div>{{ message }}</div>
                    <button
                        @click="removeMessage(index)"
                        class="ml-2 text-green-600 hover:text-green-800 focus:outline-none focus:text-green-800"
                        title="Close"
                    >
                        <svg
                            class="w-4 h-4"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M10 11.414l4.95 4.95-1.414 1.414L8.586 12 3.636 16.95 2.222 15.536 7.172 10 2.222 5.05 3.636 3.636 8.586 8.586 12 3.636l4.95-4.95 1.414 1.414L11.414 10z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</template>

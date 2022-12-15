<script setup>

</script>

<template>
    <div class="overflow-x-auto relative max-w-md shadow-md sm:rounded-lg">
        <table class="min-w-full divide-y divide-gray-300">
            <thead class="bg-gray-50">
                <tr>
                    <slot name="headColumns" />
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
                <slot name="tableRows" />
            </tbody>
        </table>
    </div>
</template>

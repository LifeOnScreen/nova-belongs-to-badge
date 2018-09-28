<template>
    <span>
        <span v-if="field.value">
            <router-link :to="{
                name: 'detail',
                params: {
                    resourceName: field.resourceName,
                    resourceId: field.belongsToId
                }
            }"
                         class="no-underline dim text-primary font-bold">
                <span class="rounded-full uppercase px-2 py-1 text-xs font-bold whitespace-no-wrap"
                      :style="{ backgroundColor: field.backgroundColor, color: field.foregroundColor }"
                >{{ field.value }}</span>
            </router-link>
        </span>

        <span v-else>&mdash;</span>
    </span>
</template>

<script>
    export default {
        props: ['resourceName', 'field'],
    }
</script>

<template>
    <panel-item :field="field">
        <template slot="value">
            <router-link
                    v-if="field.value"
                    :to="{name: 'detail', params: {
                    resourceName: field.resourceName,
                    resourceId: field.belongsToId
                }}"
                    class="no-underline font-bold dim text-primary"
            >
                <span class="rounded-full uppercase px-2 py-1 text-xs font-bold"
                      :style="{ backgroundColor: field.backgroundColor, color: field.foregroundColor }"
                >{{ field.value }}</span>
            </router-link>
            <p v-else>&mdash;</p>
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>

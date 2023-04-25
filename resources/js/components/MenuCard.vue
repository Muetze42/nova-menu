<template>
    <div
        :class="[item.classes, 'sidebar-'+item.section+'-card']" class="sidebar-card"
        :style="item.styles"
        v-html="item.content"
        v-tooltip.click="item.tooltip"
    />
</template>

<script>
export default {
    name: "MenuCard",
    props: [
        'item',
    ],
    methods: {},
}
</script>

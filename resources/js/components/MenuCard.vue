<template>
    <div
        :class="[item.classes.filterClass, item.classes.card, 'sidebar-'+item.section+'-card']" class="sidebar-card"
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

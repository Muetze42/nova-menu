<template>
  <div
    :class="[item.classes.filterClass, item.classes.card, 'sidebar-'+item.section+'-card']"
    class="sidebar-card"
    :style="item.styles"
    v-html="item.content"
    v-tooltip.click="item.tooltip"
  />
</template>

<script>
export default {
  name: 'MenuCard',
  props: {
    /**
     * @type {import("./../types").AdvancedMenuCard}
     */
    item: {
      type: Object,
      required: true
    }
  },
  methods: {}
}
</script>

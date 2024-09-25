<template>
  <div v-if="item.items.length > 0" :class="item.classes.filterClass">
    <h4 @click.prevent="handleClick" class="flex items-center px-1 py-1 rounded text-left text-gray-500" :class="[{
      'cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800':
        displayAsButton,
      'font-bold text-primary-500 dark:text-primary-500': item.active,
    }, item.icons.classes.elem, { 'cursor-pointer menu-iframe-group': item.iframe.target }]"
      v-tooltip.click="item.tooltip" @click="item.iframe.target ? open = true : null">
      <span class="inline-block shrink-0 w-6 h-6">
        <NHMenuIcon :icons="item.icons" v-if="!item.icons.asLabel" />
      </span>

      <span class="flex-1 flex items-center w-full tracking-wide uppercase font-bold text-left text-xs px-3 py-1"
        :class="'gap-x-' + item.icons.labelGap">
        <NHMenuIcon :icons="item.icons" v-if="item.icons.asLabel" class="inline-block" />
        {{ item.name }}
      </span>

      <span v-if="item.collapsable" class="inline-flex items-center justify-center shrink-0 w-6 h-6">
        <CollapseButton :collapsed="collapsed" :to="item.path" />
      </span>
    </h4>

    <div v-if="!collapsed && !item.iframe.target">
      <component :key="item.name" v-for="item in item.items" :is="item.component" :item="item" />
    </div>
  </div>
  <div :class="item.iframe.wrapper.classes" :style="item.iframe.wrapper.styles" @click="open = false" v-if="open">
    <iframe :class="item.iframe.iframe.classes" :style="item.iframe.iframe.styles" :src="item.iframe.target"></iframe>
  </div>
</template>

<script>
import Collapsable from './../../../vendor/laravel/nova/resources/js/mixins/Collapsable.js'

export default {
  mixins: [Collapsable],

  props: ['item'],

  methods: {
    handleClick() {
      if (this.item.collapsable) {
        this.toggleCollapse()
      }
    }
  },

  data() {
    return {
      open: false
    }
  },
  watch: {
    open(isOpen) {
      let body = document.querySelector('body')
      body.style.overflow = isOpen ? 'hidden' : 'visible'
    }
  },

  computed: {
    component() {
      if (this.item.items.length > 0) {
        return 'div'
      }

      return 'h3'
    },

    displayAsButton() {
      return this.item.items.length > 0 && this.item.collapsable
    },

    collapsedByDefault() {
      return this.item?.collapsedByDefault ?? false
    }
  }
}
</script>

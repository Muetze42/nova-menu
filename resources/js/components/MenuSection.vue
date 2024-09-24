<template>
  <div class="relative" v-if="item.path || item.items.length > 0" :class="item.classes.filterClass">
    <component :is="component" :href="item.path ?? null" @click.prevent="handleClick"
      :tabindex="displayAsButton ? 0 : null"
      class="w-full flex items-start px-1 py-1 rounded text-left text-gray-500 dark:text-gray-500 focus:outline-none focus:ring focus:ring-primary-200 dark:focus:ring-gray-600"
      :class="[{
        'cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800':
          displayAsButton,
        'font-bold text-primary-500 dark:text-primary-500': item.active,
      }, item.icons.classes.elem, { 'cursor-pointer menu-iframe-section': item.iframe.target }]"
      v-tooltip.click="item.tooltip" @click="item.iframe.target ? open = true : null">
      <span class="inline-block shrink-0 w-6 h-6">
        <NHMenuIcon :icons="item.icons" />
      </span>

      <span class="flex-1 flex items-center w-full px-3 text-base"
        :class="[{ 'font-bold inertia-link-active': item.active }, item.icons.classes.label]">
        {{ item.name }}
      </span>

      <span class="inline-block h-6 shrink-0">
        <Badge v-if="item.badge" :extra-classes="item.badge.typeClass">
          {{ item.badge.value }}
        </Badge>
      </span>

      <span v-if="item.collapsable" class="inline-flex items-center justify-center shrink-0 w-6 h-6">
        <CollapseButton :collapsed="collapsed" :to="item.path" />
      </span>
    </component>

    <div v-if="!item.iframe.target && item.items.length > 0 && !collapsed" class="mt-1 space-y-1">
      <component :is="item.component" v-for="item in item.items" :key="item.name" :item="item" />
    </div>
  </div>
  <div :class="item.iframe.wrapper.classes" :style="item.iframe.wrapper.styles" @click="open = false" v-if="open">
    <iframe :class="item.iframe.iframe.classes" :style="item.iframe.iframe.styles" :src="item.iframe.target"></iframe>
  </div>
</template>

<script>
import Collapsable from './../../../vendor/laravel/nova/resources/js/mixins/Collapsable.js'
import { mapGetters, mapMutations } from 'vuex'

export default {
  mixins: [Collapsable],

  props: ['item'],

  data() {
    return {
      open: false
    };
  },
  watch: {
    open(isOpen) {
      let body = document.querySelector('body')
      body.style.overflow = isOpen ? 'hidden' : 'visible'
    }
  },

  methods: {
    ...mapMutations(['toggleMainMenu']),

    handleClick() {
      if (this.item.collapsable) {
        this.toggleCollapse()
      }

      if (this.mainMenuShown && this.component !== 'button') {
        this.toggleMainMenu()
      }
    },
  },

  computed: {
    ...mapGetters(['mainMenuShown']),

    component() {
      if (this.item.path) {
        return 'Link'
      }

      if (this.item.items.length > 0 && this.item.collapsable) {
        return 'button'
      }

      return 'h3'
    },

    displayAsButton() {
      return ['Link', 'button'].includes(this.component)
    },

    collapsedByDefault() {
      return this.item?.collapsedByDefault ?? false
    },
  },
}
</script>

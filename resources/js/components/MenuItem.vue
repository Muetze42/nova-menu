<template>
  <div>
    <component
      :is="component"
      v-bind="linkAttributes"
      class="w-full flex min-h-8 px-1 py-1 rounded text-left text-gray-500 dark:text-gray-500 focus:outline-none focus:ring focus:ring-primary-200 dark:focus:ring-gray-600 cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-800"
      :data-active-link="item.active"
      :class="[{
        'font-bold text-primary-500 dark:text-primary-500': item.active,
      }, { 'inertia-link-active': item.active }, { 'cursor-pointer menu-iframe-item': item.iframe.target }, item.icons.classes.elem, item.classes.filterClass]"
      @click="item.iframe.target ? open = true : handleClick()"
    >
      <span class="inline-block shrink-0 w-6 h-6">
        <AdvancedMenuIcon :icons="item.icons" v-if="!item.icons.asLabel" />
      </span>

      <span class="flex-1 flex items-center w-full px-3 text-sm" :class="'gap-x-'+item.icons.labelGap + item.icons.classes.label">
        <AdvancedMenuIcon :icons="item.icons" v-if="item.icons.asLabel" />
        {{ item.name }}
      </span>

      <span class="inline-block h-6 shrink-0">
        <Badge v-if="item.badge" :extra-classes="item.badge.typeClass">
          {{ item.badge.value }}
        </Badge>
      </span>
    </component>
  </div>
  <div :class="item.iframe.wrapper.classes" :style="item.iframe.wrapper.styles" @click="open = false" v-if="open">
    <iframe :class="item.iframe.iframe.classes" :style="item.iframe.iframe.styles" :src="item.iframe.target"></iframe>
  </div>
</template>

<script>
import identity from 'lodash/identity'
import omitBy from 'lodash/omitBy'
import pickBy from 'lodash/pickBy'
import { mapGetters, mapMutations } from 'vuex'

export default {
  props: {
    /**
     * @type {import("./../types").AdvancedMenuItem}
     */
    item: {
      type: Object,
      required: true,
    },
  },

  data() {
    return {
      open: false
    }
  },

  methods: {
    ...mapMutations(['toggleMainMenu']),

    handleClick() {
      if (this.mainMenuShown) {
        this.toggleMainMenu()
      }
    },
  },

  computed: {
    ...mapGetters(['mainMenuShown']),

    requestMethod() {
      return this.item.method || 'GET'
    },

    component() {
      if (this.requestMethod !== 'GET') {
        return 'FormButton'
      } else if (this.item.external !== true) {
        return 'Link'
      }

      return 'a'
    },

    linkAttributes() {
      let method = this.requestMethod

      return pickBy(
        omitBy(
          {
            href: this.item.path,
            method: method !== 'GET' ? method : null,
            headers: this.item.headers || null,
            data: this.item.data || null,
            rel: this.component === 'a' ? 'noreferrer noopener' : null,
            target: this.item.target || null,
          },
          value => value === null
        ),
        identity
      )
    },
  },
}
</script>

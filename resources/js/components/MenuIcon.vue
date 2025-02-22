<template>
  <Icon
    v-if="icons && icons.heroicon"
    :name="icons.heroicon"
    :is="`heroicons-outline-${icons.heroicon}`"
    :height="icons.height"
    :width="icons.height"
    :class="icons.classes.icon"
    class="sidebar-hero-icon"
  />
  <i
    class="sidebar-fa-icon"
    v-else-if="icons && icons.fontawesome"
    :class="icons.fontawesome + icons.classes.icon"
    :style="{fontSize: icons.height + 'px'}"
  />
  <span
    v-else-if="icons && icons.html"
    class="sidebar-html-icon"
    :class="'sidebar-icon-h'+icons.height + icons.classes.icon"
    v-html="icons.html"
  />
  <img
    v-else-if="icons && icons.image"
    :src="icons.image"
    alt="Icon"
    :class="icons.classes.icon"
    :style="{maxHeight: icons.height + 'px'}"
    class="sidebar-image-icon"
  />
</template>

<script>
import { Icon } from 'laravel-nova-ui'

export default {
  components: {
    Icon,
  },
  props: {
    /**
     * @type {import("./../types").AdvancedMenuIcon}
     */
    icons: {
      type: Object,
      required: true
    }
  },
}
</script>

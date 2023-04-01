<template>
    <component
        v-if="icons.heroicon"
        :is="`heroicons-outline-${icons.heroicon}`"
        :height="icons.height"
        :width="icons.height"
        :class="icons.classes.icon"
    />
    <i
        class="sidebar-fa-icon"
        v-else-if="icons.fontawesome"
        :class="icons.fontawesome, icons.classes.icon"
        :style="{fontSize: icons.height + 'px'}"
    />
    <span
        v-else-if="icons.html"
        class="sidebar-fa-icon"
        :class="'sidebar-icon-h'+icons.height, icons.classes.icon"
        v-html="icons.html"
    />
    <img
        v-else-if="icons.image"
        :src="icons.image"
        alt="Icon"
        :class="icons.classes.icon"
        :style="{maxHeight: icons.height + 'px'}"
    />
</template>

<script>
export default {
    name: "Icon",
    props: ['icons']
}
</script>

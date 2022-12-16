<template>
    <component v-if="item.icon && !item.awesome"
               :is="`heroicons-outline-${item.icon}`"
               height="24"
               width="24"
    />
    <i :class="item.icon" class="sidebar-fa-icon fa-fw" v-if="item.icon && item.awesome"></i>
</template>

<script>
export default {
    name: "MenuItemIcon",
    props: {
        item: Object,
    }
}
</script>

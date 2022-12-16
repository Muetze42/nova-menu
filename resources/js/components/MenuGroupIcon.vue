<template>
    <component v-if="item.icon && !item.awesome"
               :is="`heroicons-outline-${item.icon}`"
               height="24"
               width="24"
    />
    <span class="sidebar-icon sidebar-fa-icon" v-if="item.icon && item.awesome">
        <i :class="item.icon" class="fa-fw"></i>
    </span>
</template>

<script>
export default {
    name: "MenuGroupIcon",
    props: {
        item: Object
    }
}
</script>

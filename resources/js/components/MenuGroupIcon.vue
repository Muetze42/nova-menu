<template>
    <component v-if="item.icon && !item.awesome"
               :is="`heroicons-outline-${item.icon}`"
               height="24"
               width="24"
               :class="{ 'inline as-label': item.as_label }"
    />

    <i v-if="item.as_label" :class="item.icon" class="fa-fw as-label"></i>
    <span v-else class="sidebar-icon sidebar-fa-icon" v-if="item.icon && item.awesome">
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

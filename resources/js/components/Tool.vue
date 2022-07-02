<template>
    <div class="sidebar-section" v-if="item.items.length">
        <!-- Section title with link -->
        <Link v-if="item.path" :href="item.path" class="sidebar-section-title">
            <span class="sidebar-label">
                <span class="sidebar-icon sidebar-fa-icon">
                    <i :class="item.icon"></i>
                </span>

                <span
                    :class="{ 'font-bold inertia-link-active': item.active }"
                    class="sidebar-section-label"
                >
                    {{ item.name }}
                </span>
            </span>
        </Link>

        <!-- Collapsable Section -->
        <button
            v-else-if="!item.path && item.collapsable"
            :aria-expanded="ariaExpanded"
            class="sidebar-section-title"
            @click="handleClick"
        >
            <span class="sidebar-label">
                <span class="sidebar-icon sidebar-fa-icon">
                    <i :class="item.icon"></i>
                </span>

                <span class="sidebar-section-label">
                    {{ item.name }}
                </span>
            </span>

            <CollapseButton :collapsed="collapsed" :to="item.path" class="ml-auto" />
        </button>

        <h3 v-else class="sidebar-section-title">
            <span class="sidebar-label">
                <span class="sidebar-icon sidebar-fa-icon">
                    <i :class="item.icon"></i>
                </span>

                <span class="sidebar-section-label">
                    {{ item.name }}
                </span>
            </span>
        </h3>

        <template v-if="!collapsed">
            <div class="mt-1 space-y-1">
                <component
                    :is="item.component"
                    v-for="item in item.items"
                    :key="item.name"
                    :item="item"
                />
            </div>
        </template>
    </div>
</template>

<script>
import { Collapsable } from './../mixins/index'

export default {
    mixins: [Collapsable],

    props: ['item'],

    methods: {
        handleClick() {
            this.toggleCollapse()
        },
    },
}
</script>

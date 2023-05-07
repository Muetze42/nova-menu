<template>
    <div class="sidebar-section" :class="item.classes.filterClass" v-if="item.path || item.items.length > 0">
        <!-- Section title with link -->
        <Link
            v-if="item.path"
            :href="item.path"
            class="sidebar-section-title"
            @click="handleClick"
            :class="item.icons.classes.elem"
            v-tooltip.click="item.tooltip"
        >
            <span class="sidebar-label">
                <span class="sidebar-icon">
                    <NHMenuIcon :icons="item.icons" />
                </span>

                <span
                    :class="[{'font-bold inertia-link-active': item.active}, item.icons.classes.label]"
                    class="sidebar-section-label"
                >
                    {{ item.name }}

                    <span v-if="item.badge" class="mx-2 absolute right-3">
                        <Badge :extra-classes="item.badge.typeClass">
                            {{ item.badge.value }}
                        </Badge>
                    </span>
                </span>
            </span>
        </Link>

        <!-- Collapsable Section -->
        <button
            v-else-if="!item.path && item.collapsable"
            :aria-expanded="ariaExpanded"
            class="sidebar-section-title"
            @click="toggleCollapse"
            :class="item.icons.classes.elem"
            v-tooltip.click="item.tooltip"
        >
            <span class="sidebar-label">
                <span class="sidebar-icon">
                    <NHMenuIcon :icons="item.icons" />
                </span>

                <span class="sidebar-section-label" :class="item.icons.classes.label">
                    {{ item.name }}
                </span>

                <span v-if="item.badge" class="mx-2 absolute right-8">
                    <Badge :extra-classes="item.badge.typeClass">
                        {{ item.badge.value }}
                    </Badge>
                </span>
            </span>

            <CollapseButton :collapsed="collapsed" :to="item.path" class="ml-auto" />
        </button>

        <h3
            v-else
            class="sidebar-section-title"
            :class="[item.icons.classes.elem, { 'cursor-pointer menu-iframe-section': item.iframe.target }]"
            v-tooltip.click="item.tooltip"
            @click="item.iframe.target ? open = true : null"
        >
            <span class="sidebar-label">
                <span class="sidebar-icon">
                    <NHMenuIcon :icons="item.icons" />
                </span>

                <span class="sidebar-section-label" :class="item.icons.classes.label">
                    {{ item.name }}
                </span>
            </span>
        </h3>

        <template v-if="!collapsed && !item.iframe.target">
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
    <div :class="item.iframe.wrapper.classes" :style="item.iframe.wrapper.styles" @click="open = false" v-if="open">
        <iframe :class="item.iframe.iframe.classes" :style="item.iframe.iframe.styles" :src="item.iframe.target"></iframe>
    </div>
</template>

<script>
import Collapsable from './../../../../../vendor/laravel/nova/resources/js/mixins/Collapsable.js'
import { mapGetters, mapMutations } from 'vuex'

export default {
    name: "MenuSection",
    mixins: [Collapsable],
    props: ['item'],
    data() {
        return {
            open: false
        };
    },
    methods: {
        ...mapMutations(['toggleMainMenu']),

        handleClick() {
            if (this.mainMenuShown) {
                this.toggleMainMenu()
            }
        },
    },
    watch: {
        open(isOpen) {
            let body = document.querySelector('body')
            body.style.overflow = isOpen ? 'hidden' : 'visible'
        }
    },
    computed: {
        ...mapGetters(['mainMenuShown']),

        collapsedByDefault() {
            return this.item?.collapsedByDefault ?? false
        },
    },
}
</script>

<template>
    <div class="sidebar-group" v-if="item.items.length > 0">
        <button
            v-if="item.collapsable"
            @click="handleClick"
            class="sidebar-group-button mt-3"
        >
            <h4 class="sidebar-group-title">
                <span class="sidebar-group-icon">
                    <component v-if="item.icon && !item.awesome"
                               :is="`heroicons-outline-${item.icon}`"
                               height="24"
                               width="24"
                    />
                    <span class="sidebar-icon sidebar-fa-icon" v-if="item.icon && item.awesome">
                        <i :class="item.icon" class="ml-auto"></i>
                    </span>
                </span>

                <span class="sidebar-group-label">
          {{ item.name }}
        </span>

                <CollapseButton
                    class="sidebar-group-collapse-btn ml-auto"
                    :collapsed="collapsed"
                />
            </h4>
        </button>
        <h4 v-else class="sidebar-group-title">
            <span class="sidebar-group-icon">
                <component v-if="item.icon && !item.awesome"
                    :is="`heroicons-outline-${item.icon}`"
                    height="24"
                    width="24"
                />
                <span class="sidebar-icon sidebar-fa-icon" v-if="item.icon && item.awesome">
                    <i :class="item.icon" class="ml-auto"></i>
                </span>
            </span>
            <span class="sidebar-group-label">
        {{ item.name }}
      </span>
        </h4>

        <template v-if="!collapsed">
            <component
                :key="item.name"
                v-for="item in item.items"
                :is="item.component"
                :item="item"
            />
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

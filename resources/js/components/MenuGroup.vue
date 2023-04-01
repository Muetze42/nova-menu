<template>
    <div class="sidebar-group" v-if="item.items.length > 0">
        <button
            v-if="item.collapsable"
            @click="handleClick"
            class="sidebar-group-button mt-3"
            :class="item.icons.classes.elem"
        >
            <h4 class="sidebar-group-title">
                <span class="sidebar-group-icon">
                    <NHMenuIcon :icons="item.icons" v-if="!item.icons.asLabel" />
                </span>

                <span class="sidebar-group-label flex items-center" :class="'gap-x-'+item.icons.labelGap">
                    <NHMenuIcon :icons="item.icons" v-if="item.icons.asLabel" class="inline-block" />
                    <span :class="item.icons.classes.label">
                        {{ item.name }}
                    </span>
                </span>

                <CollapseButton
                    class="sidebar-group-collapse-btn ml-auto"
                    :collapsed="collapsed"
                />
            </h4>
        </button>
        <h4 v-else class="sidebar-group-title" :class="item.icons.classes.elem">
            <span class="sidebar-group-icon">
                <NHMenuIcon :icons="item.icons" v-if="!item.icons.asLabel" />
            </span>

            <span class="sidebar-group-label flex items-center" :class="'gap-x-'+item.icons.labelGap">
                <NHMenuIcon :icons="item.icons" v-if="item.icons.asLabel" class="inline-block" />
                <span :class="item.icons.classes.label">
                    {{ item.name }}
                </span>
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
import Collapsable from './../../../../../vendor/laravel/nova/resources/js/mixins/Collapsable.js'

export default {
    name: "MenuGroup",
    mixins: [Collapsable],
    props: ['item'],
    methods: {
        handleClick() {
            this.toggleCollapse()
        },
    },
    computed: {
        collapsedByDefault() {
            return this.item?.collapsedByDefault ?? false
        },
    },
}
</script>

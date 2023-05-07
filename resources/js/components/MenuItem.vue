<template>
    <div class="sidebar-item" :class="item.classes.filterClass">
        <component
            :is="component"
            v-bind="linkAttributes"
            class="sidebar-item-title relative"
            :class="[{ 'inertia-link-active': item.active }, { 'cursor-pointer menu-iframe-item': item.iframe.target }, item.icons.classes.elem]"
            @click="item.iframe.target ? open = true : handleClick"
            v-tooltip.click="item.tooltip"
        >
            <span class="sidebar-item-icon flex items-center">
                <NHMenuIcon :icons="item.icons" v-if="!item.icons.asLabel" />
            </span>
            <span class="sidebar-item-label flex items-center flex items-center" :class="'gap-x-'+item.icons.labelGap + item.icons.classes.label">
                <NHMenuIcon :icons="item.icons" v-if="item.icons.asLabel" />
                {{ item.name }}

                <span v-if="item.badge" class="mx-2 absolute right-0">
                    <Badge :extra-classes="item.badge.typeClass">
                        {{ item.badge.value }}
                    </Badge>
                </span>
            </span>
        </component>
    </div>
    <div :class="item.iframe.wrapper.classes" :style="item.iframe.wrapper.styles" @click="open = false" v-if="open">
        <iframe :class="item.iframe.iframe.classes" :style="item.iframe.iframe.styles" :src="item.iframe.target"></iframe>
    </div>
</template>

<script>
import identity from 'lodash/identity'
import isNull from 'lodash/isNull'
import omitBy from 'lodash/omitBy'
import pickBy from 'lodash/pickBy'
import { mapGetters, mapMutations } from 'vuex'

export default {
    name: "MenuItem",
    props: {
        item: {
            type: Object,
            required: true,
        },
    },
    data() {
        return {
            open: false
        };
    },
    watch: {
        open(isOpen) {
            let body = document.querySelector('body')
            body.style.overflow = isOpen ? 'hidden' : 'visible'
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
            } else if (!this.item.iframe.target && this.item.external !== true) {
                return 'Link'
            }

            return 'a'
        },

        linkAttributes() {
            let method = this.requestMethod

            return pickBy(
                omitBy(
                    {
                        href: !this.item.iframe.target ? this.item.path : null,
                        method: method !== 'GET' ? method : null,
                        headers: this.item.headers || null,
                        data: this.item.data || null,
                        rel: !this.item.iframe.target && this.component === 'a' ? 'noreferrer noopener' : null,
                        target: this.item.target || null,
                    },
                    isNull
                ),
                identity
            )
        },
    },
}
</script>

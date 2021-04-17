<template>
  <v-hover>
    <div slot-scope="{hover}" :class="hover ? hoverColor : ''">
      <v-list-tile @click.stop="$emit('click')" :to="to" v-bind="$attrs">
        <v-list-tile-action>
          <v-icon v-text="icon"></v-icon>
        </v-list-tile-action>
        <v-list-tile-title>
          <slot>{{text}}</slot>
        </v-list-tile-title>
      </v-list-tile>
    </div>
  </v-hover>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      default: "Menu Item"
    },
    icon: {
      type: String,
      default: "help"
    },
    hoverColor: {
      type: String
    },
    to: {
      default: ""
    }
  }
};
</script>

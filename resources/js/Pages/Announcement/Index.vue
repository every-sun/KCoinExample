<template>
    <div class="w-full">
        <ContentLayout :childList="contentList" />
    </div>
</template>
<script setup>
import ContentLayout from "@components/ContentLayout.vue";
import Create from "../Admin/Announcement/Components/Create.vue";
import List from "./Components/List.vue";
import Show from "./Components/Show.vue";

const props = defineProps({
    announcements: {
        type: Object,
        requried: true,
    },
    announcement: {
        type: Object,
        requried: true,
    },
});
const contentList = [
    props.announcement
        ? {
              title: "공지사항",
              url: `/announcement/${props.announcement.id}`,
              comp: Show,
              data: props.announcement,
          }
        : {
              title: "공지사항",
              url: "/announcement",
              comp: List,
              data: props.announcements,
          },
    {
        title: "공지사항 등록",
        url: "/admin/announcement/create",
        comp: Create,
    },
];
</script>

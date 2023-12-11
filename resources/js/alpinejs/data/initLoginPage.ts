import eventBus from "@/packages/eventBus";
import { EVENT_KEY } from "./initMediaViewer";

export default() => ({
  openMedia: function () {
    eventBus(EVENT_KEY).emit(0, 'source', 'image/jpeg');
  }
});

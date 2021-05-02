// filepond
// import FilePondPluginMediaPreview from 'filepond-plugin-media-preview';

const requestHeader = {
  "X-CSRF-Token": document
    .getElementsByTagName("meta")
  ["csrf-token"].getAttribute("content"),
};
const courseId = document.getElementById("course-id").value;
const uploadUrl = `/teaching/${courseId}/upload`;
const revertUrl = `/teaching/${courseId}/revert`;

FilePond.registerPlugin(FilePondPluginFileValidateType, FilePondPluginMediaPreview, FilePondPluginImagePreview);

const videoUploadInput = document.getElementById("video-upload");
const coverUploadInput = document.getElementById("cover-upload");
const videoPond = FilePond.create(videoUploadInput, { acceptedFileTypes: ['video/mpeg', 'video/mp4', 'video/ogg'] });
const coverPond = FilePond.create(coverUploadInput, { acceptedFileTypes: ['image/*'] });

// videoPond.labelIdle = 'ドラッグまたは <span class="filepond--label-action"> ブラウズ </span>';

// TODO: error handling
coverPond.setOptions({
  server: {
    process: {
      url: uploadUrl + "?type=image",
      method: "POST",
      headers: requestHeader,
    },
    revert: async (file, load, error) => {
      console.log("image file data", file);
      // Should remove the earlier created temp file here
      const res = await fetch(`${revertUrl}?type=image`, {
        method: "DELETE",
        headers: requestHeader,
        body: file,
      });
      console.log(await res.json());
      // Can call the error method if something is wrong, should exit after
      error("Revert failed");
      // Should call the load method when done, no parameters required
      load();
    },
  },
});

videoPond.setOptions({
  maxFiles: 5,
  server: {
    process: {
      url: uploadUrl + "?type=video",
      method: "POST",
      headers: requestHeader,
    },
    revert: async (file, load, error) => {
      console.log("video file data", file);
      // Should remove the earlier created temp file here
      const res = await fetch(`${revertUrl}?type=video`, {
        method: "DELETE",
        headers: requestHeader,
        body: file,
      });
      console.log(await res.json());
      // Can call the error method if something is wrong, should exit after
      error("Revert failed");
      // Should call the load method when done, no parameters required
      load();
    },
  },
});
// videoPond.onprocessfile = (error, file) => {
//   console.log('process file', file);
// }

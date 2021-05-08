
$(function () {
  $('#video-update-modal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)

    let id = button.data('id')
    $('#video-update-form').attr('action', `/videos/${id}`)

    let title = button.data('title')
    let track = button.data('track')
    let summary = button.data('summary')

    const videoModal = $(this)
    videoModal.find('#video-modal-title').val(title)
    videoModal.find('#video-modal-track').val(track)
    videoModal.find('#video-modal-summary').val(summary)
  })


  $('#video-delete-modal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)

    let id = button.data('id')
    $('#video-delete-form').attr('action', `/videos/${id}`)


    let title = button.data('delete')
    $(this).find('#video-delete-data').text(title)
  })

  $('#publish-modal').on('show.bs.modal', function (event) {
    let button = $(event.relatedTarget)
    let id = button.data('id')
    $('#publish-form').attr('action', `/teaching/${id}/publish`)

    let text = button.data('text')
    $(this).find('#publish-form-text').text(text)
  })
})
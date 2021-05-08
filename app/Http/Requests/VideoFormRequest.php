<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Video;

class VideoFormRequest extends FormRequest
{

    protected function prepareForValidation()
    {
        $this->merge(['video_id' => $this->route('videoId')]);
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $video = Video::find($this->route('videoId'));
        if (!$video) {
            return back();
        }
        switch ($this->method()) {
            case 'put':
            case 'PUT':
                return $video && $this->user()->can('update-video', $video);
            case 'delete':
            case 'DELETE':
                return $video && $this->user()->can('delete-video', $video);

            default:
                return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        switch ($this->method()) {
            case 'put':
            case 'PUT':
                return [
                    'video_id' => 'required|exists:videos,id',
                    'title' => 'required|max:255',
                    'track' => 'integer|digits_between:1,100',
                    'summary' => 'nullable|max:500',
                ];
            case 'delete':
            case 'DELETE':
                return [
                    'video_id' => 'required|exists:videos,id'
                ];

            default:
                return [];
        }
    }
}

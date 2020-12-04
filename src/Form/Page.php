<?php
namespace Litecms\Page\Form;

class Page
{
    /**
     * Variable to store form configuration.
     *
     * @var collection
     */
    protected $form;

    /**
     * Variable to store form configuration.
     *
     * @var collection
     */
    protected $element;

    /**
     * Initialize the form.
     *
     * @return null
     */
    public function __construct()
    {
        $this->setForm();
    }

    /**
     * Return form elements.
     *
     * @return array.
     */
    public function form($element = 'fields', $grouped = true)
    {
        $item = collect($this->form->get($element));
        if ($element == 'fields' && $grouped == true) {
            return $item->groupBy(['tab', 'section']);
        }
        return $item;

    }

    /**
     * Sets the form and form elements.
     * @return null.
     */
    public function setForm()
    {
        $this->form = collect([
            'form' => [
                'store' => ['a'],
                'update' => ['b'],
            ],
            'tabs' => [
                'main' => 'Main',
                'meta' => "Meta",
                'image' => "Images",
            ],
            'fields' => [
                'heading' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "rules" => 'required|max:100',
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'meta_title' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',
                    ],
                ],
                'name' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'slug' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'order' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'view' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "meta",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'compile' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'status' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'upload_folder' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "meta",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'content' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "second",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'meta_keyword' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'meta_description' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
                'abstract' => [
                    "type" => 'text',
                    "label" => "",
                    "alt" => "",
                    "label" => "",
                    "tab" => "main",
                    "section" => "first",
                    "class" => [
                        'wrapper' => "",
                        "label" => 'a',
                        "input" => 'b',

                    ],
                ],
            ],
        ]
        );

    }
}

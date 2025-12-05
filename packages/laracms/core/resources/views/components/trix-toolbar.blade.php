<div class="trix-button-row mb-2">
      <span class="laracms-trix-button-group mr-2" data-trix-button-group="text-tools">
        <x-laracms::button variant="trix" data-trix-key="b" data-trix-attribute="bold" title="Bold" tabindex="-1" icon="type-bold"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-key="i" data-trix-attribute="italic" title="Italic" tabindex="-1" icon="type-italic"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-key="s" data-trix-attribute="strike" title="Strike" tabindex="-1" icon="type-strikethrough"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-attribute="href" data-trix-action="link" title="Strike" tabindex="-1" icon="link-45deg"></x-laracms::button>
      </span>

      <span class="laracms-trix-button-group mr-2" data-trix-button-group="heading-tools">
          <x-laracms::button variant="trix" data-trix-attribute="heading1" title="Heading 1" tabindex="-1" icon="type-h1"></x-laracms::button>
          <x-laracms::button variant="trix" data-trix-attribute="heading2" title="Heading 2" tabindex="-1" icon="type-h2"></x-laracms::button>
          <x-laracms::button variant="trix" data-trix-attribute="heading3" title="Heading 3" tabindex="-1" icon="type-h3"></x-laracms::button>
      </span>

      <span class="laracms-trix-button-group mr-2" data-trix-button-group="block-tools">
        <x-laracms::button variant="trix" data-trix-attribute="quote" title="Quote" tabindex="-1" icon="quote"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-attribute="code" title="Code" tabindex="-1" icon="braces"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-attribute="bullet" title="Bullets" tabindex="-1" icon="list-ul"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-attribute="number" title="Numbers" tabindex="-1" icon="list-ol"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-action="decreaseNestingLevel" title="Outdent" tabindex="-1" icon="unindent"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-action="increaseNestingLevel" title="Indent" tabindex="-1" icon="indent"></x-laracms::button>
      </span>

      <span class="trix-button-group-spacer"></span>

      <span class="laracms-trix-button-group" data-trix-button-group="history-tools">
        <x-laracms::button variant="trix" data-trix-action="undo" data-trix-key="z" title="Undo" tabindex="-1" icon="arrow-counterclockwise"></x-laracms::button>
        <x-laracms::button variant="trix" data-trix-action="redo" data-trix-key="shift+z" title="Redo" tabindex="-1" icon="arrow-clockwise"></x-laracms::button>
      </span>
    </div>

    <div class="trix-dialogs" data-trix-dialogs>
      <div class="trix-dialog trix-dialog--link" data-trix-dialog="href" data-trix-dialog-attribute="href">
        <div class="trix-dialog__link-fields">
          <input type="url" name="href" class="trix-input trix-input--dialog" placeholder="placeholder" aria-label="url" data-trix-validate-href required data-trix-input>
          <div class="trix-button-group">
            <input type="button" class="trix-button trix-button--dialog" value="Link" data-trix-method="setAttribute">
            <input type="button" class="trix-button trix-button--dialog" value="Unlink" data-trix-method="removeAttribute">
          </div>
        </div>
      </div>
    </div>
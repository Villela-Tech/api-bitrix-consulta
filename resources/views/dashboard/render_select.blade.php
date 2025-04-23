<select class="form-control" value="{{ $field }}" id="{{ $id }}">
    <option value='-1'>{{ trans('messages.settings.not_selected') }}</option>
    @foreach ($company_fields as $key => $value)
    echo $value['isMultiple'];
    <?php if (!in_array($value['type'], $type) || $value['isMultiple'] != $multiple) { ?>

    <?php } else if ($key == $field) { ?>
        <option selected="selected" value="{{ $key }}">
            {{ (isset($value["filterLabel"]) ? $value["filterLabel"] : $value["title"]) }}
        </option>
    <?php } else { ?>
        <option value="{{ $key }}">
            {{ (isset($value["filterLabel"]) ? $value["filterLabel"] : $value["title"]) }}
        </option>
    <?php } ?>
    @endforeach
</select>
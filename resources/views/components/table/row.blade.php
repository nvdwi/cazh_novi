<tr class="{{ in_array($row[$primaryKey], $this->selectedRow) ? 'bg-light-primary' : ''}}">
    {{ $slot }}
</tr>

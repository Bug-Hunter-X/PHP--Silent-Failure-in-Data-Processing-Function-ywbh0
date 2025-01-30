```php
function processData(array $data): array {
  // Check if the array is empty
  if (empty($data)) {
    return [];
  }

  // Process the data
  $result = [];
  foreach ($data as $item) {
    // Assume each item is an array with 'id' and 'value'
    if (isset($item['id'], $item['value'])) {
      $result[$item['id']] = $item['value'];
    } else {
      // Handle the case where an item is missing 'id' or 'value'
      // This is a common error that can be easily missed. 
      //Instead of silently ignoring or throwing a generic error message,
      //log the error and continue to process other items. 
      error_log('Invalid data item: ' . json_encode($item));
    }
  }

  return $result;
}

// Example Usage
$data = [
  ['id' => 1, 'value' => 'one'],
  ['id' => 2, 'value' => 'two'],
  ['id' => 3],
  ['value' => 'four']
];

$result = processData($data);
print_r($result);
```
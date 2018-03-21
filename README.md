dot-controller-compat
---

Provides a basic adapt to psr/http-server-middleware for controllers that use http-interop/http-middleware.

# Usage:

```php
<?php

namespace Your\Namespace;

use Dot\ControllerCompat\CompatibleControllerTrait;

class YourController
{
	use CompatibleControllerTrait;
}
```


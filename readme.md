# Basic usage

```php
use HackerEsq\FilterModels\FilterModels;

class PortfolioController extends ApiController
{
    public function index(FilterModels $filters)
    {
        $filters->setQuery(Portfolio::query());
        $filters->setScopes(['myPortfolios']);
        $filters->setEagerRelations(['users', 'transactions', 'holdings']);
        $filters->setFilterableRelations(['holdings' => 'symbol', 'transactions' => 'symbol']);
        $filters->setSearchableColumns(['title', 'notes']);

        return $filters->paginated();
    }
}
```

# Using filter classes

1. Define a custom filter that extends the FilterModels class:

```php
namespace App\Filters;

use HackerEsq\FilterModels\FilterModels;

class PortfolioFilters extends FilterModels
{
    public function apply()
    {
        $this->setScopes(['myPortfolios']);
        $this->setEagerRelations(['users', 'transactions', 'holdings']);
        $this->setFilterableRelations(['holdings' => 'symbol', 'transactions' => 'symbol']);
        $this->setSearchableColumns(['title', 'notes']);

        return $this->paginated();
    }
}
```

2. Add the Filterable trait to your model:

```php
namespace App\Models;

use HackerEsq\FilterModels\Traits\Filterable;

class Portfolio extends Model
{
    use Filterable;
}
```

3. Then use your custom filter like this:

```php
use App\Filters\PortfolioFilters;

class PortfolioController extends ApiController
{
    public function index(PortfolioFilters $filters)
    {

        return Portfolio::filtered($filters);
    }
}
```
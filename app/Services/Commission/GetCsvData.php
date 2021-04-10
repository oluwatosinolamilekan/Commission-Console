<?php

namespace App\Services\Commission;

class GetCsvData
{
    public function run()
    {
        return  [
              ["2019-06-01",4,"person","withdraw",1000  ],
              ["2020-01-05",4,"person","withdraw",1000  ],
              ["2020-02-05",1,"person","deposit",200  ],
              ["2020-02-06",2,"business","withdraw",300  ],
              ["2020-02-06",1,"person","withdraw",30000  ],
              ["2019-06-12",4,"person","deposit",1000  ],
              ["2020-06-07",1,"person","withdraw",1000  ],
              ["2020-06-07",1,"person","withdraw",100  ],
              ["2020-08-10",1,"person","withdraw",100  ],
              ["2020-08-10",2,"business","deposit",10000  ],
              ["2020-12-07",1,"person","deposit",500  ],
              ["2021-02-10",3,"person","withdraw",1000  ],
              ["2021-02-15",1,"person","withdraw",300  ],
              ["2021-02-19",5,"person","withdraw",3000000  ],
              ["2021-03-10",3,"person","deposit",2000  ]
        ];
    }
}

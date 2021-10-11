import React, {useState, useEffect} from 'react';
import ReactDOM from 'react-dom';
import DataTable from 'react-data-table-component';
import CustomMaterialPagination from './components/CustomMaterialPagination ';

import './index.scss';

document.addEventListener('DOMContentLoaded', function(){
    
    const divsToUpdate = document.querySelectorAll(".casauto-seller-listing");
    divsToUpdate.forEach(function(div) {
        const data = JSON.parse(div.querySelector("pre").innerHTML);
        
        
        ReactDOM.render(<SellerListing {...data} />, div)
        div.classList.remove("casauto-seller-listing")
      })
});




function SellerListing(props){
    
    const columns = [
        {
            name: 'Make',
            selector: row => row.make,
        },
        {
            name: 'Model',
            selector: row => row.model,
        },
        {
            name: 'Year',
            selector: row => row.year,
        },
        {
            name: 'Status',
            selector: row => row.status,
        },
    ];

    let data = [];
  
    Object.entries(props).forEach(
        ([key, value]) => {
           let titleArray = value.post_title.split(' ');
            let make = titleArray[0];
            let model = titleArray[1];
            let year = titleArray[2];
          data =   [...data, { id: key+1, make,model,year, status: value.post_status}]
        }
    );
    
   

    return(
        <DataTable
            columns={columns}
            data={data}
            pagination
            paginationComponent={CustomMaterialPagination}
            
        />
    );

}
// ##################################################################
// ######################   table sotring   #########################

const tBody = document.querySelector(".offer-table-body");
const tTr = tBody.querySelectorAll("tr");
const tRows = Array.from(tTr);

const sortTableByColum = (tTr, colum, asc = true) => {
  const d = asc ? 1 : -1;
  const sortedRows = tTr.sort((a, b) => {
    const aConentText = a
      .querySelector(`td:nth-child(${colum})`)
      .textContent.trim()
      .toLowerCase();
    const bConentText = b
      .querySelector(`td:nth-child(${colum})`)
      .textContent.trim()
      .toLowerCase();
    return aConentText > bConentText ? 1 * d : -1 * d;
  });

  return sortedRows;
};

const sortsBy = document.querySelectorAll(".sortby");
sortsBy.forEach((th) => {
  let isAsc = true;
  th.addEventListener("click", () => {
    const colum = Number(th.dataset.colum);
    const sortedRows = sortTableByColum(tRows, colum, isAsc);
    isAsc = !isAsc;
    tBody.append(...sortedRows);
  });
});
